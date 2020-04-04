<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::create($request->all());

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'user' => $user,
            'access_token' => $accessToken
        ]);
    }

    public function login(Request $request)
    {
        $validatedData = $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->all())){
            return response([
                'message' => 'Invalid credentials'
            ],422);
        }
        $user = User::whereUsername('admin')->first();

        $accessToken = $user->createToken('authToken')->accessToken;
        return response([
            'user' => $user,
            'access_token' => $accessToken
        ]);
        
    }
}
