<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTransactionRequest;
use App\Http\Resources\Admin\TransactionResource;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $type = $request->input('type');
        $user_id = $request->input('user_id');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to', now()->toDateString()); // Default to current date if date_to is empty
        $dateTo = Carbon::parse($dateTo)->addDay()->toDateString(); // Add one day

        $users = User::where('role',User::$user)->orderBy('name','asc')->get();
        $transactions = Wallet::with('user')
        ->when($user_id, function ($query) use ($user_id) {
            $query->where('user_id',$user_id);
        })->when($type, function ($query) use ($type) {
            $query->where('type',$type);
        });
        
        if ($dateFrom && $dateTo) {
            $transactions->whereBetween('created_at', [$dateFrom, $dateTo]);
        }elseif ($dateTo) {
            $transactions->whereDate('created_at', '<=', $dateTo);
        }
        
        $transactions = $transactions->latest()->paginate(10);
        $data = json_decode(json_encode(TransactionResource::collection($transactions)));

        $transactions->appends([
            'type' => $type,
            'user_id' => $user_id,
            'date_to' => $request->date_to,
            'date_from' => $request->date_from,
        ]);

        if ($request->ajax()) {
            return view('admin.transactions.pagination', compact('transactions','data'))->render();
        }
        return view('admin.transactions.index',compact('transactions','data','users'));
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
    public function store(StoreTransactionRequest $request)
    {
        $data  = $request->validated();
        Wallet::create($data);
        session()->flash('success','Transaction created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
