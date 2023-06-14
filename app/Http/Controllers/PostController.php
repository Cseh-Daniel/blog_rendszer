<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Label;

class PostController extends Controller
{

    public function list()
    {
        return view("home", ['posts' => Post::all()]);
    }


    public function newPost()
    {

        return view("newPost", ['tags' => Label::all()]);
    }

    public function createPost()
    {

        $post = request()->validate([

            "title" => ["required", "min:5", "max:30"],
            "text" => ["required", "min:10"],
            "tags" => ["required"]
        ]);

        /**
         * a select2 számot ad vissza ha a felhasználó már meglevő elemet választ,
         * ha új opciót addmeg, akkor a beütött szöveget kapjuk meg.
         */

        $post["author_id"] = Auth::id();
        dd($post);
        //Post::create($post);
        return redirect("/")->with("post_ok", "Új bejegyzés létrehozva!");
    }

    public function readPost($id)
    {

        return view('readPost', ['post' => Post::find($id)]);
    }

    public function editPostForm($id)
    {

        return view('editPost', ['post' => Post::find($id)]);
    }

    public function editPost($id)
    {

        $req = request()->validate([

            "title" => ["required", "min:5", "max:30"],
            "text" => ["required", "min:10"]
        ]);

        $post = Post::find($id);
        $post->title = $req["title"];
        $post->text = $req["text"];
        $post->update();
        //Post::save($post);
        return redirect("/")->with("post_ok", "Bejegyzés módosítva!");
    }

    public function deletePost($id)
    {

        $post = Post::find($id);
        $post->delete();
        return redirect("/")->with("post_ok", "Bejegyzés törölve!");
    }

    public function tagging()
    {



        $tag = request();

        dd($tag->pelda[0] . " és " . $tag->pelda[1]);

        //return $tag["pelda"];

    }
}
