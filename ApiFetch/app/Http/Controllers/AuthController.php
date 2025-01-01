<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerUserRequiest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(registerUserRequiest $request){
        $dataUser=$request->validated();
        $user=User::create($dataUser);
        $token=$user->createToken($request->name);
        return[
            'user'=>$user,
            'token'=>$token->plainTextToken
        ];

    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ]);
        $user=User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return [
                'errors'=>[
                    'email'=>['the provided credentials are incorrect']
                ]   
            ];
        }
        $token=$user->createToken($user->name);
        return[
            'user'=>$user,
            'token'=>$token->plainTextToken
        ];

    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return [
            'message'=>'You are loug out'
        ];

    }
    public function GetUser(){
        $users=User::all();
        return $users;
    }
}
