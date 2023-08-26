<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $validForm = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if($validform->fails()){
            return response()->json([
                'message' => 'invalid field'
            ]);
        }

        if(!Auth::attemp($validForm)){
            return response()->json([
                'message' => 'Email or Password is incorect',
            ]);
        }

        $user = Auth()->User();
        $token = $user->createToken('auth:sactum')->plainTextToken;
        return response()->json([
            'message' => 'login success',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'token' => $user->token
            ]
            ]);
    }
}
