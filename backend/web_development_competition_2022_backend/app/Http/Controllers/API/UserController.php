<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user() {
        return auth()->user();
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(! Auth::attempt($credentials)) {
            return response()->json(["message"=>"Invalid user data"], 403);
        }

        $access_token = auth()->user()->createToken("login")->accessToken;
        return response()->json(["user"=>Auth::user(), 'access_token'=>$access_token]);
    }

    public function logut() {
        auth()->user()->token()->revoke();
        return response()->json(["message"=>"Logged out"]);
    }

}
