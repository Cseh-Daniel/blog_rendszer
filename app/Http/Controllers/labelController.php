<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class labelController extends Controller
{

    public function deleteLabelForm()
    {

        return view("deleteLabel", ["tags" => Label::all()]);
    }

    public function deleteLabel()
    {

        $req = request()->validate([

            "lblID" => "required"

        ]);

        $lb = Label::find($req["lblID"]);
        $name = $lb->name;
        //dd($lb);
        $lb->delete();
        return redirect("/")->with("post_ok", '"' . $name . '" címke törölve!');
    }

}
