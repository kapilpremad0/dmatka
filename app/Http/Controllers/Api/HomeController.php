<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BidsResource;
use App\Http\Resources\Api\GameResource;
use App\Http\Resources\Api\WalletResource;
use App\Models\Bid;
use App\Models\Game;
use App\Models\User;
use App\Models\Wallet;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponse;
    function index(){
        try{
            $games = Game::limit(3)->get();
            $bids = Bid::where('user_id',auth()->user()->id)->latest()->limit(5)->get();
            $wallet = Wallet::where('user_id',auth()->user()->id)->latest()->limit(5)->get();
            $data = [
                'wallet_amount' => User::walletAmount(auth()->user()->id),
                'profile' => auth()->user(),
                'games'  => GameResource::collection($games),
                'bids' => BidsResource::collection($bids),
                'wallet_transactions' => WalletResource::collection($wallet),
            ];
            return $this->sendSuccess('Register Successfully',$data);
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }
}
