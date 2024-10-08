<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\WithdrawRequestResource;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WithdrawlController extends Controller
{
    function index(Request $request){

        $status = $request->input('status');
        $user_id = $request->input('user_id');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to', now()->toDateString()); // Default to current date if date_to is empty
        $dateTo = Carbon::parse($dateTo)->addDay()->toDateString(); // Add one day

        $withdrawls = Withdraw::with('user')
        ->when($user_id, function ($query) use ($user_id) {
            $query->where('user_id',$user_id);
        })->when($status, function ($query) use ($status) {
            $query->where('status',$status);
        });
        
        if ($dateFrom && $dateTo) {
            $withdrawls->whereBetween('created_at', [$dateFrom, $dateTo]);
        }elseif ($dateTo) {
            $withdrawls->whereDate('created_at', '<=', $dateTo);
        }
        
        $withdrawls = $withdrawls->latest()->paginate(10);
        $data = json_decode(json_encode(WithdrawRequestResource::collection($withdrawls)));

        $withdrawls->appends([
            'status' => $status,
            'user_id' => $user_id,
            'date_to' => $request->date_to,
            'date_from' => $request->date_from,
        ]);

        if ($request->ajax()) {
            return view('admin.withdrawls.pagination', compact('withdrawls','data'))->render();
        }
        $users = User::where('role',User::$user)->orderBy('name','asc')->get();
        return view('admin.withdrawls.index',compact('withdrawls','data','users'));

    }
}
