<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;

class PostController extends Controller
{

    public function list()
    {
        return view("home", ['posts' => Post::all()]);
    }


    public function newPost()
    {

        $post = request()->validate([

            "title" => ["required", "min:5", "max:30"],
            "text" => ["required", "min:10"]
        ]);


        $post["author_id"] = Auth::id();
        //dd($post);
        Post::create($post);
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
}
