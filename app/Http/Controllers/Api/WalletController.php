<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreWalletRequest;
use App\Http\Resources\Api\WalletResource;
use App\Models\FundRequest;
use App\Models\User;
use App\Models\Wallet;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    use ApiResponse;
    function index(Request $request){
        try{
            $bids = Wallet::where('user_id',auth()->user()->id);
                    if($request->type == 'deposit'){
                        $bids->whereIn('description',[
                            "New Added in wallet"
                        ]);
                    }
                    $bids = $bids->latest()
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

            $data = [
                'user_id' => auth()->user()->id,
                'amount' => $request->amount,
            ];

            if ($request->hasFile('file')) {
                $image = $request->file;
                $image_name = time() . rand(1, 100) . '-' . $image->getClientOriginalName();
                $image_name = preg_replace('/\s+/', '', $image_name);
                $image->move(public_path('upload'), $image_name);
                $data['image'] = $image_name;
            }
            FundRequest::create($data);
            
            // $data = Wallet::create([
            //     'user_id' => auth()->user()->id,
            //     'type' => Wallet::$credit,
            //     'amount' => $request->amount,
            //     'description' => 'Wallet Recharge'
            // ]);
            return $this->sendSuccess('Register Successfully',$data);
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }
}
