<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users=User::all();
        return view('users.index',compact('users'));
    }
    public function sendAPi(){
        $data=User::get();
        return response()->json($data);
    }
}
