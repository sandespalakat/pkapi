<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function register(RegisterRequest $request){
        // $fields = $request->validate([
        //     'first_name' => 'required|string',
        //     'last_name' => 'required|string',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|confirmed',
        // ]);
        $fields = $request->validated();

        $user = User::create($fields);

        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }

    public function login(LoginRequest $request){
        $fields = $request->validated();

        $user = User::where('email',$fields['email'])->first();
    if(!$user || !Hash::check($fields['password'], $user->password))
    {
    return response([
        'message'=>"Email or password incorrect"
    ],401);
    }
        $token = $user->createToken('myAppToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }


    public function logout(Request $request){

      auth()->user()->tokens()->delete();
      return response ([
          'message'=>"Logged out"
      ]);
    }


    public function show($id)
    {
            $user=User::find($id);
            if($user)
            return response(['data'=>$user],200);
            else
            {
                return response(['message'=>"Not found"],401);

            }
    }
}
