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
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::get()->map(function($user){
            if(empty($user->referral_code)){
                $firstThreeChars = substr($user->name, 0, 4);
                $fixedNumber = str_pad($user->id, 5, '0', STR_PAD_LEFT);
                $referal_code = $firstThreeChars.$fixedNumber;
                User::where('id',$user->id)->update([
                    'referral_code' => $referal_code,
                ]);
            }
        });


        $query_search = $request->input('search');

        $users = User::when($query_search, function ($query) use ($query_search) {
            $query->where('name', 'like', '%' . $query_search . '%');
            $query->Orwhere('mobile', 'like', '%' . $query_search . '%');
            $query->Orwhere('email', 'like', '%' . $query_search . '%');

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
        $user->delete();
        return redirect()->back()->with('success','User delete successfully');
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

    function bids($id ,Request $request){
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to', now()->toDateString()); // Default to current date if date_to is empty
        $dateTo = Carbon::parse($dateTo)->addDay()->toDateString(); // Add one day

        $bids = Bid::where('user_id',$id);
        if ($dateFrom && $dateTo) {
            $bids->whereBetween('created_at', [$dateFrom, $dateTo]);
        }elseif ($dateTo) {
            $bids->whereDate('created_at', '<=', $dateTo);
        }
        $bids = $bids->with('game')->latest()->paginate(10);
        $data = json_decode(json_encode(BidResource::collection($bids)));
        $user = User::find($id);

        $bids->appends([
            'date_to' => $request->date_to,
            'date_from' => $request->date_from,
        ]);
        if ($request->ajax()) {
            return view('admin.user.show.bids.pagination', compact('bids','data'))->render();
        }
        return view('admin.user.show.bids.index',compact('user','bids','data'));
    }

    function winners($id , Request $request){
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to', now()->toDateString()); // Default to current date if date_to is empty
        $dateTo = Carbon::parse($dateTo)->addDay()->toDateString(); // Add one day

        $winners = Winner::where('user_id',$id);
        if ($dateFrom && $dateTo) {
            $winners->whereBetween('created_at', [$dateFrom, $dateTo]);
        }elseif ($dateTo) {
            $winners->whereDate('created_at', '<=', $dateTo);
        }
        $winners = $winners->with('game','bid')->latest()->paginate(10);
        $winners->appends([
            'date_to' => $request->date_to,
            'date_from' => $request->date_from,
        ]);
        $data = json_decode(json_encode(BidResource::collection($winners)));
        $user = User::find($id);
        if ($request->ajax()) {
            return view('admin.user.show.winners.pagination', compact('winners','data'))->render();
        }
        return view('admin.user.show.winners.index',compact('user','winners','data'));
    }



    function change_withdrawl_request(Request $request){
        if($request->status == 1){
            $data = Withdraw::find($request->id);
            Wallet::create([
                'user_id' => $data->user_id,
                'type' => Wallet::$debit,
                'description' => 'Withdrawl request approved',
                'amount' => $data->amount
            ]);
        }
        Withdraw::where('id',$request->id)->update([
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success','Request change successfully');
    }

}
