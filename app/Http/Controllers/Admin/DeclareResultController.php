<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDeclareResultRequest;
use App\Models\Bid;
use App\Models\DeclareResult;
use App\Models\Game;
use App\Models\Setting;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeclareResultController extends Controller
{
    function index(Request $request)
    {
        $date = $request->date ?? $todayDate = Carbon::today()->toDateString();
        $games = Game::get()->map(function ($game) use ($date) {
            $game->result_declare = $game->date_result($date);
            return $game;
        });
        return view('admin.declare_results.index', compact('games', 'date'));
    }


    function store(StoreDeclareResultRequest $request)
    {
        $todayDate = $request->date;
        $game_id = $request->game_id;
        $game = Game::find($game_id);
        $prices = Setting::whereIn('key', [
            Setting::$crossing_winning_amount,
            Setting::$haruf_winning_amount,
            Setting::$jodi_winning_amount
        ])->pluck('value', 'key');

        $declare_result = DeclareResult::updateOrCreate([
            'game_id' => $game_id,
            'date' => $todayDate,
        ], [
            'number' => $request->number,
        ]);

        Winner::where('declare_id', $declare_result->id)->delete();
        Wallet::where('declare_id', $declare_result->id)->delete();
        $declare_number = $request->number;

        $bids = Bid::whereDate('created_at', $todayDate)
            ->where('game_id', $game_id)
            ->get();

        $bids->each(function ($bid) use ($prices, $declare_result, $game, $declare_number) {
            $price = $prices["{$bid->type}_winning_amount"] ?? 0;

            if (($bid->type === 'jodi' || $bid->type === 'crossing') && $declare_number == $bid->number) {
                $this->createWinnerAndWallet($bid, $declare_result, $price, $game);
            } elseif ($bid->type === 'haruf') {
                $firstDigit = substr($declare_number, 0, 1);
                $lastDigit = substr($declare_number, 1, 1);

                // Check for 'A' with first digit and 'B' with last digit conditions
                if (strpos($bid->number, 'A') !== false && strpos($bid->number, $firstDigit) !== false) {
                    $this->createWinnerAndWallet($bid, $declare_result, $price, $game);
                } elseif (strpos($bid->number, 'B') !== false && strpos($bid->number, $lastDigit) !== false) {
                    $this->createWinnerAndWallet($bid, $declare_result, $price, $game);
                }
            }
        });

        return redirect()->back()->with('success', 'Result declared successfully');
    }

    private function createWinnerAndWallet($bid, $declare_result, $price, $game)
    {
        $winner = Winner::updateOrCreate([
            'bid_id' => $bid->id,
        ], [
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
            'description' => "You've won the bid for '{$game->name}' with a {$bid->type}",
            'declare_id' => $declare_result->id,
            'type_by' => Wallet::$game_winner,
        ]);

        
        $user = User::with('from_referral')->find($bid->user_id);
        if(!empty($user->from_referral)){
            $referral_commission =  Setting::getReferralCommision();
            $commission_amount = ($price * $referral_commission) / 100;
            Wallet::create([
                'declare_id' => $declare_result->id,
                'amount' => $commission_amount,
                'description' => 'You won commission amount',
                'type' => Wallet::$credit,
                'user_id' => $user->id,
                'type_by' => Wallet::$referral_commission,
            ]);
        }

    }



    function destroy($id)
    {
        Winner::where('declare_id', $id)->delete();
        Wallet::where('declare_id', $id)->delete();
        DeclareResult::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Delete result successful');
    }
}
