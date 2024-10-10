<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreBidRequest;
use App\Http\Resources\Api\BidsResource;
use App\Models\Bid;
use App\Models\Game;
use App\Models\User;
use App\Models\Wallet;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BidController extends Controller
{
    use ApiResponse;

    function index(){
        try{
            $bids = Bid::where('user_id',auth()->user()->id)
                    ->with('game','winner')
                    ->latest()
                    ->paginate(20);
                    
            $data = json_decode(json_encode(BidsResource::collection($bids)));
            return $this->sendSuccess('Register Successfully',$bids);
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }

    function store(StoreBidRequest $request){
        try{
            $game = Game::find($request->game_id);
            $bids_value = collect($request->bids);
            $wallet_amount = User::walletAmount(auth()->user()->id);
            // $wallet_amount = 40;
            
            if($wallet_amount < $bids_value->sum('amount')){
                return json_encode([
                    "Error" => [
                        'amount' => "You don't have enough balance to create bids."
                    ]
                ],400);
            }
            
            $bids = [];
            foreach($request->bids as $bid){
                $bids[] =  Bid::create([
                    'user_id' => auth()->user()->id,
                    'game_id' => $request->game_id,
                    'type' => $request->type,
                    'number' => $bid['number'],
                    'amount' => $bid['amount'],
                ]);
                Wallet::create([
                    'user_id' => auth()->user()->id,
                    'amount' => $bid['amount'],
                    'type' => Wallet::$debit,
                    'description' => "For placing this game: {$game->name}",
                    'type_by' => Wallet::$play_bid
                ]);
            }
            return $this->sendSuccess('Register Successfully',$bids);
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }
}
