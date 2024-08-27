<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\BidResource;
use App\Models\Bid;
use App\Models\Game;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $game_id = $request->input('game_id');
        $user_id = $request->input('user_id');

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to', now()->toDateString()); // Default to current date if date_to is empty
        $dateTo = Carbon::parse($dateTo)->addDay()->toDateString(); // Add one day

        $games = Game::orderby('name','asc')->get();
        $users = User::where('role',User::$user)->orderBy('name','asc')->get();



        $bids = Bid::with('user','game')
        ->when($user_id, function ($query) use ($user_id) {
            $query->where('user_id',$user_id);
        })->when($game_id, function ($query) use ($game_id) {
            $query->where('game_id',$game_id);
        });

        if ($dateFrom && $dateTo) {
            $bids->whereBetween('created_at', [$dateFrom, $dateTo]);
        }elseif ($dateTo) {
            $bids->whereDate('created_at', '<=', $dateTo);
        }

        $bids = $bids->latest()->paginate(10);
        
        $data = json_decode(json_encode(BidResource::collection($bids)));


        $bids->appends([
            'game_id' => $game_id,
            'user_id' => $user_id,
            'date_to' => $request->date_to,
            'date_from' => $request->date_from,
        ]);

        if ($request->ajax()) {
            return view('admin.bids.pagination', compact('bids','data'))->render();
        }

        return view('admin.bids.index',compact('bids','data','games','users'));
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
    public function store(Request $request)
    {
        //
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
