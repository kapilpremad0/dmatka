<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\WinnerResource;
use App\Models\Game;
use App\Models\User;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    function index(Request $request){
        $games = Game::orderby('name','asc')->get();
        $users = User::where('role',User::$user)->orderBy('name','asc')->get();

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to', now()->toDateString()); // Default to current date if date_to is empty
        $dateTo = Carbon::parse($dateTo)->addDay()->toDateString(); // Add one day
        $game_id = $request->input('game_id');
        $user_id = $request->input('user_id');

        $winners = Winner::with('user','game','bid')
        ->when($user_id, function ($query) use ($user_id) {
            $query->where('user_id',$user_id);
        })->when($game_id, function ($query) use ($game_id) {
            $query->where('game_id',$game_id);
        });

        if ($dateFrom && $dateTo) {
            $winners->whereBetween('created_at', [$dateFrom, $dateTo]);
        }elseif ($dateTo) {
            $winners->whereDate('created_at', '<=', $dateTo);
        }
        
        $winners = $winners->latest()->paginate(10);

        $winners->appends([
            'game_id' => $game_id,
            'user_id' => $user_id,
            'date_to' => $request->date_to,
            'date_from' => $request->date_from,
        ]);
        $data = json_decode(json_encode(WinnerResource::collection($winners)));

        if ($request->ajax()) {
            return view('admin.winners.pagination', compact('bids','data'))->render();
        }
        return view('admin.winners.index',compact('winners','data','users','games'));
    }
}
