<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{

    public function loginForm(){ return view('login');}

    public function login(Request $req)
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
        throw ValidationException::withMessage(["logErr" => "Hibás email vagy jelszó"]);
    }

    public function logout()
    {

        auth()->logout();
        return redirect("/");
    }
}
