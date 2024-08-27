<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\Game;
use App\Models\User;
use App\Models\Winner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function dashboard(Request $request){

        $data = [
            'total_game' => Game::count(),
            'total_user' => User::where('role',User::$user)->count(),
            'today_bids' => Bid::whereDate('created_at',now())->count(),
            'today_total_bids_amount' => Bid::whereDate('created_at',now())->sum('amount'),
            'today_winning' => Winner::whereDate('date',now())->sum('amount'),
            'total_winning' => Winner::sum('amount'),
        ];
        return view('admin.dashboard.index',compact('data'));
    }
}
