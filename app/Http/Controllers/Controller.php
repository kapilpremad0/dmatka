<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    function changePassword ($user_id){
        
        return view('admin.auth.reset-password',compact('user_id'));
    }

    function StorechangePassword(ForgotPasswordRequest $request){
        User::where('id',$request->user_id)->update([
            'password' => Hash::make($request->password),
            'password_2' => $request->password,
        ]);
        return redirect()->back()->with('success','Password change successfully');
    }
}
