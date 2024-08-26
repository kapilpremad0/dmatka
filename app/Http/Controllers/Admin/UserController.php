<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use Illuminate\Http\Request;

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
