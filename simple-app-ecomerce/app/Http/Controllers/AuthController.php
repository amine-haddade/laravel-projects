<?php

namespace App\Http\Controllers;

use App\Http\Requests\login_user_validation;
use App\Models\Admin;
use App\Http\Requests\login_validation;
use App\Models\Product;
use App\Models\User;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function admin_login(){
        // Admin::create([
        //     'username' => 'amine_haddade_2004',
        //     'password'=>'amine2004',
        // ]);
        return view('admin.login');
    }
        public function admin_dologin(login_validation $request){
            
        $credentials = $request->validated();
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.index')->with('success', 'login has  succesfuky');
        }
        return back()->withErrors([
            'username' => "Les informations d'identification ne sont pas correctes.",
        ]);
    }
    public function user_login(){
        // User::create([
        //     'name' => 'amine_haddade',
        //     'email' => 'amine_haddade789@gmail.com',
        //     'password'=>'1234',
        // ]);
        
        
        
        return view('product.login');
    }
    public function user_dologin(login_user_validation $request){
        $credentials=$request->validated();
        // dd($credentials=$request->validated());
        if(Auth::guard('web')->attempt($credentials)){
            return redirect()->route('product.index')->with('success', 'login has  succesfuky');
        }
        return back()->withErrors([
            'email' => "Les informations d'identification ne sont pas correctes.",
        ]);
    }
    function user_logout(){
        Auth::logout();
        return redirect()->route('product.index');
    }
    function admin_logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('product.index');
    }
}
