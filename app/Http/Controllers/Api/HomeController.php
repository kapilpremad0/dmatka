<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BidsResource;
use App\Http\Resources\Api\GameResource;
use App\Http\Resources\Api\WalletResource;
use App\Models\Bid;
use App\Models\Game;
use App\Models\Setting;
use App\Models\User;
use App\Models\Wallet;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponse;
    function index(){
        try{
            $games = Game::orderBy('id','DESC')->get();
            foreach($games as $key => $val){
                $val['result_declare'] = $val->today_result();
            }
            $bids = Bid::where('user_id',auth()->user()->id)->latest()->limit(5)->get();
            $wallet = Wallet::where('user_id',auth()->user()->id)->latest()->limit(5)->get();

            $payments =[
                'qr_code' => Setting::where('key',Setting::$payment_qr_code)->first()->value ?? 0,
                'upi_id' => Setting::where('key',Setting::$payment_upi_id)->first()->value ?? 0,
                'whatsaap_no' => Setting::where('key',Setting::$payment_whatsaap_no)->first()->value ?? 0,
            ];

            if(!empty($payments['qr_code'])){
                $payments['qr_code'] = url('public/upload/'.$payments['qr_code']);
            }


            $data = [
                'wallet_amount' => User::walletAmount(auth()->user()->id),
                'banners' => [
                    url('public/upload/chit.jpg')
                ],
                'profile' => auth()->user(),
                'payment_setting' => $payments,
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
