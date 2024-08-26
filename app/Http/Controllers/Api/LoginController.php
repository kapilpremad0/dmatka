<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiResponse;
    function register(RegisterRequest $request){
        try{
            $data = $request->validated();
            $data['password'] = Hash::make($request->password);
            $data['password_2'] = $request->password;
            $data['role'] = User::$user;
            $user = User::create($data);
            return $this->sendSuccess('Register Successfully',$user);
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }

    function login(LoginRequest $request){
        try{
            $user = User::where('email',$request->email)->where('role',User::$user)->first();
            if (Hash::check($request->password, $user->password)) {
                $token =  $user->createToken($user->id)->plainTextToken;
                $token = explode('|',$token)[1];
                $user->token = $token;
                return $this->sendSuccess('Login successful',$user);
            } else {
                $error = ['password' => ['Incorrect password entered. Please try again.']];
                return $this->sendFailed($error,400);
            }
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }
}
