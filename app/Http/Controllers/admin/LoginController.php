<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        //atenticando
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended("/admin");
        }

        return back()->withErrors(["erro" => "E-mail ou senha inválidos."]);
    }

    public function logout(){
        Auth::logout();
        return redirect("/admin");
    }
}
