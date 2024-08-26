<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDeclareResultRequest;
use App\Models\Bid;
use App\Models\DeclareResult;
use App\Models\Game;
use App\Models\Setting;
use App\Models\Wallet;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeclareResultController extends Controller
{
    function index(Request $request){
        $date = $request->date ?? $todayDate = Carbon::today()->toDateString();
        $games = Game::get()->map(function($game) use($date){
            $game->result_declare = $game->date_result($date);
            return $game;
        });   
        return view('admin.declare_results.index',compact('games','date'));
    }


    function store(StoreDeclareResultRequest $request){
        $todayDate = $request->date;
        $game_id = $request->game_id;
        $game = Game::find($game_id);
        $prices = Setting::whereIn('key',[Setting::$crossing_winning_amount,Setting::$haruf_winning_amount,Setting::$jodi_winning_amount])->pluck('value','key');

        $declare_result = DeclareResult::updateOrCreate([
            'game_id' => $request->game_id,
            'date' => $todayDate,
        ],[
            'number' => $request->number,
        ]);
        

        Winner::where('declare_id',$declare_result->id)->delete();
        Wallet::where('declare_id',$declare_result->id)->delete();

        $bids = Bid::whereDate('created_at',$todayDate)
        ->where('game_id',$request->game_id)
        ->where('number',$request->number)
        ->get()->map(function($bid) use($prices,$declare_result,$game){

            if($bid->type == 'jodi'){
                $price = $prices['jodi_winning_amount'];
            }
            if($bid->type == 'crossing'){
                $price = $prices['crossing_winning_amount'];
            }
            if($bid->type == 'haruf'){
                $price = $prices['haruf_winning_amount'];
            }

            $winner = Winner::updateOrCreate([
                'bid_id' => $bid->id,
            ],[
                'declare_id' => $declare_result->id,
                'user_id' => $bid->user_id,
                'game_id' => $declare_result->game_id,
                'bid_id' => $bid->id,
                'amount' => $bid->amount * $price,
                'date' => $declare_result->date,
            ]);

            Wallet::create([
                'user_id' => $bid->user_id,
                'type' => Wallet::$credit,
                'amount' => $winner->amount,
                'description'=> "You've won the bid for '{$game->name}' with a {$bid->type}",
                'declare_id' => $declare_result->id,
            ]);

        });
        return redirect()->back()->with('success','Result declared successfully');
    }
}
