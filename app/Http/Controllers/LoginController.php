<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function loginForm(){ return view('login');}

    public function login()
    {

        $credentials = request()->validate([
            "email" => ["required", "exists:users"],
            "password" => ["required"]


        ]);

        if (auth()->attempt($credentials)) {

            //return "<h1>".$credentials["email"]."</h1>";
            return redirect("/");
        }
        /**
         * külön nézetbe szedni a bejelentkezést és regisztrálást
         */
        throw ValidationException::withMessages(["logErr" => "Hibás email vagy jelszó!"]);
    }

    public function logout()
    {

        auth()->logout();
        return redirect("/");
    }
}
