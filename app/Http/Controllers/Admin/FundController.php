<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\FundRequestResource;
use App\Http\Resources\Api\WithdrawRequestResource;
use App\Models\FundRequest;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FundController extends Controller
{
    function index(Request $request){

        if($request->change_status == 'true'){
            
            if($request->status == 1){
                $fund = FundRequest::find($request->id);
                    $data = Wallet::create([
                        'user_id' => $fund->user_id,
                        'type' => Wallet::$credit,
                        'amount' => $fund->amount,
                        'description' => 'Wallet Recharge',
                        'type_by' => Wallet::$wallet_recharge,
                    ]);
            }
            FundRequest::where('id',$request->id)->update(['status' => $request->status]);
            return redirect()->back()->with('success','Fund Request Change Successfully');
        }
        $status = $request->input('status');
        $user_id = $request->input('user_id');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to', now()->toDateString()); // Default to current date if date_to is empty
        $dateTo = Carbon::parse($dateTo)->addDay()->toDateString(); // Add one day

        $funds = FundRequest::with('user')
        ->when($user_id, function ($query) use ($user_id) {
            $query->where('user_id',$user_id);
        })->when($status, function ($query) use ($status) {
            $query->where('status',$status);
        });
        
        if ($dateFrom && $dateTo) {
            $funds->whereBetween('created_at', [$dateFrom, $dateTo]);
        }elseif ($dateTo) {
            $funds->whereDate('created_at', '<=', $dateTo);
        }
        
        $funds = $funds->latest()->paginate(10);
        $data = json_decode(json_encode(FundRequestResource::collection($funds)));

        $funds->appends([
            'status' => $status,
            'user_id' => $user_id,
            'date_to' => $request->date_to,
            'date_from' => $request->date_from,
        ]);
        // $funds = [];

        if ($request->ajax()) {
            return view('admin.funds.pagination', compact('funds','data'))->render();
        }
        $users = User::where('role',User::$user)->orderBy('name','asc')->get();
        return view('admin.funds.index',compact('funds','data','users'));

    }
}
