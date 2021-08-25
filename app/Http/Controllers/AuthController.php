<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt($request->only('username', 'password'))){
            return redirect('home');
        }
        else{
            return redirect()->back()->with('gagal','* Harap Masukkan Username Dan Password Dengan Benar ');
        }

    }
}
