<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    //

    public function login(){
        // User::create([
        //     'name' => 'amine 1234',
        //     'email' => 'amine1234@gmail.com',
        //     'password' => 'amine 1234'
        // ]);
        
        return view('users.login');// vers page de fotmulaire de connexion
    }

    public function dologin(loginRequest $request){// les donnée de requeste

        $credentials=$request->validated();// stocker les donnée de user

        if(Auth::attempt($credentials)){// retourner vrai si l'utilsateur existant dans la base de douner 
            $request->session()->regenerate();
            return redirect()->route('posts.index');
        }

        return to_route("users.login")->withErrors([
            "email"=>"email invalide"
        ])->onlyInput('email');
   
    }

    public function logout(){
        Auth::logout();
        return to_route('posts.index');
    }

    public function singup(){
        return view('users.create');
    }

    public function store(Request $request){
        request()->validate([
            'name'=>["required",'min:3'],
            'email'=>["required",'email'],
            'password'=>['required','min:4'],
        ]);

        $name=request()->input("name");
        $email=request()->input("email");
        $password=request()->input("password");
        User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>Hash::make($password),
        ]);


        return redirect()->route('posts.index')->with('sucsess','users created succesefuly');




    }


}
