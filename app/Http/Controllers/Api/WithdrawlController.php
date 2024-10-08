<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreWithdrawRequest;
use App\Http\Resources\Api\WithdrawRequestResource;
use App\Models\Withdraw;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class WithdrawlController extends Controller
{
    use ApiResponse;

    function store(StoreWithdrawRequest $request){
        try{
            $data = $request->validated();
            $data['user_id'] = auth()->user()->id;
            $Withdraw = Withdraw::create($data);
            return $this->sendSuccess('Register Successfully',$Withdraw);
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }

    function index(){
        try{
            $Withdraw = Withdraw::where('user_id',auth()->user()->id)->latest()->paginate(20);
            $data = json_decode(json_encode(WithdrawRequestResource::collection($Withdraw)));
            return $this->sendSuccess('Register Successfully',$Withdraw);
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }
}
