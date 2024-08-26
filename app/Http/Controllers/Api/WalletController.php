<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreWalletRequest;
use App\Http\Resources\Api\WalletResource;
use App\Models\User;
use App\Models\Wallet;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    use ApiResponse;
    function index(){
        try{
            $bids = Wallet::where('user_id',auth()->user()->id)
                    ->latest()
                    ->paginate(20);

            $bids_data = WalletResource::collection($bids);
            $data = $bids->toArray();
            $data['data'] = $bids_data->resolve(); // Convert the resource collection to array
            $data['wallet_amount'] = User::walletAmount(auth()->user()->id);
            return $this->sendSuccess('Register Successfully',$data);
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }

    function store(StoreWalletRequest $request){
        try{
            $data = Wallet::create([
                'user_id' => auth()->user()->id,
                'type' => Wallet::$credit,
                'amount' => $request->amount,
                'description' => 'Wallet Recharge'
            ]);
            return $this->sendSuccess('Register Successfully',$data);
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }
}
