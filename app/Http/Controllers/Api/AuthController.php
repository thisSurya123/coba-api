<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Response;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $validForm = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if($validForm->fails()){
            return response([
                'message' => 'invalid field'
            ], 422);
        }

        $credential = Request(['email', 'password']);
        if(!Auth::attempt($credential)){
            return response()->json([
                'message' => $validForm->message,
            ], 422);
        }

        $user = User::where(['email' => $request->email])->first();
        $token = $user->createToken('auth:sactum')->plainTextToken;
        return response()->json([
            'message' => 'login success',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token
            ]
            ]);
    }
}
