<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function regForm(){

        return view("register");

    }

    public function registration(){

        $credentials=request()->validate([
            "email"=>["required","unique:users","email"],
            "name"=>["required","unique:users","min:5","max:20"],
            "password"=>["required","min:8","confirmed"]
        ]);

        //dd($credentials["email"]);

        User::create($credentials);

        //jobb lenne ha a loginhoz dobna vissza üzenettel
        return redirect("/registration")->with("reg_ok","A regisztráció sikeres!<br>Kérlek jelentkezz be!");

    }
}
