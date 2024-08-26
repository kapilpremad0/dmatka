<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\BidResource;
use App\Http\Resources\Admin\TransactionResource;
use App\Http\Resources\Admin\UserResource;
use App\Http\Resources\Api\WalletResource;
use App\Models\Bid;
use App\Models\Wallet;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query_search = $request->input('search');

        $users = User::when($query_search, function ($query) use ($query_search) {
            $query->where('first_name', 'like', '%' . $query_search . '%');
            $query->Orwhere('last_name', 'like', '%' . $query_search . '%');

        })->where('role',User::$user)->latest()->paginate(10);

        $data = json_decode(json_encode(UserResource::collection($users)));
        if ($request->ajax()) {
            return view('admin.user.pagination', compact('users','data'))->render();
        }
        return view('admin.user.index',compact('users','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.show.basic',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $data['password_2'] = $request->password;
        User::where('id',$user->id)->update($data);
        return redirect()->back()->with('success','Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


    function transactions($id , Request $request){
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $transactions = Wallet::where('user_id',$id);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to', now()->toDateString()); // Default to current date if date_to is empty
        $dateTo = Carbon::parse($dateTo)->addDay()->toDateString(); // Add one day
        if ($dateFrom && $dateTo) {
            $transactions->whereBetween('created_at', [$dateFrom, $dateTo]);
        }elseif ($dateTo) {
            $transactions->whereDate('created_at', '<=', $dateTo);
        }

        $transactions = $transactions->latest()->paginate(10);

        $data = json_decode(json_encode(TransactionResource::collection($transactions)));
        $user = User::find($id);
        $user['wallet_amount'] = User::walletAmount($id);

        $transactions->appends([
            'date_to' => $request->date_to,
            'date_from' => $request->date_from,
        ]);

        if ($request->ajax()) {
            return view('admin.user.show.transactions.pagination', compact('transactions','data'))->render();
        }
        return view('admin.user.show.transactions.index',compact('user','transactions','data'));
    }

    function bids($id){
        $bids = Bid::where('user_id',$id)->with('game')->latest()->paginate(10);
        $data = json_decode(json_encode(BidResource::collection($bids)));
        $user = User::find($id);
        return view('admin.user.show.bids.index',compact('user','bids','data'));
    }

    function winners($id){
        $winners = Winner::where('user_id',$id)->with('game','bid')->latest()->paginate(10);
        $data = json_decode(json_encode(BidResource::collection($winners)));
        $user = User::find($id);
        return view('admin.user.show.winners.index',compact('user','winners','data'));
    }






}
