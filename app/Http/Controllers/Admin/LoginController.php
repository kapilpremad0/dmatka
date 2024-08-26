<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function checkLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    function login(){
        return view('admin.auth.login');
    }



    function home(){
        if (auth()->check()) {
            // if(Auth::user()->role == User::$admin){
                return redirect()->route('admin.dashboard');
            // }else{
                return redirect()->route('admin.login');    
            // }
        } else {
            return redirect()->route('admin.login');
        }
    }

    function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
