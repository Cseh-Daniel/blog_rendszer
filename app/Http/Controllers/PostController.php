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
         * ha új opciót admeg, akkor a beütött szöveget kapjuk meg.
         */

        $post["user_id"] = Auth::id();

        foreach ($post["tags"] as &$tag) {

            if (str_starts_with($tag, '#$lb')) {

                $tag = substr($tag, 4);
            } else {

                $tag = ucfirst($tag);

                $newLb = Label::create([

                    'name' => $tag

                ]);
                $tag = $newLb->id;
            }
        }

        $post["label_id"] = $post["tags"][0];

        // dd($post);

        /* $result = "";
        foreach ($post["tags"] as &$tag) {
            $result .= $tag . " | ";
        }


        dd($result);*/

        Post::create($post);
        return redirect("/")->with("post_ok", "Új bejegyzés létrehozva!");
    }

    public function readPost($id)
    {
        $view = view('readpost', ['post' => Post::find($id)]);
        return $this->checkPost($id, $view);
    }

    public function editPostForm($id)
    {
        //$usedTags=Post::find($id)->label->id;
        //$usedTags='#$lb'.$usedTags;

        /* foreach($usedTags as &$tag){

            $tag='#$lb'.$tag->id;

        }*/

        //dd($usedTags);

        $view = view('editPost', ['post' => Post::find($id), 'tags' => Label::all(), 'usedTags' => Post::find($id)->label->id]);
        return $this->checkPost($id,$view);
    }

    public function editPost($id)
    {

        $req = request()->validate([

            "title" => ["required", "min:5", "max:30"],
            "text" => ["required", "min:10"],
            "tags" => ["required"]
        ]);

        foreach ($req["tags"] as &$tag) {

            if (str_starts_with($tag, '#$lb')) {

                $tag = substr($tag, 4);
            } else {

                $tag = ucfirst($tag);

                $newLb = Label::create([

                    'name' => $tag

                ]);
                $tag = $newLb->id;
            }
        }



        $post = Post::find($id);
        $post->title = $req["title"];
        $post->text = $req["text"];
        $post["label_id"] = $req["tags"][0];
        // $post["label_id"] = $req["tags"];
        //dd($post);
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

    public function checkPost($id, $view)
    {
        if (Post::find($id) == null) {
            return redirect("/");
        }

        return $view;
    }
}
