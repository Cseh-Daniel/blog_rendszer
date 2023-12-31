<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Label;
use App\Models\LabelPost;


class PostController extends Controller
{

    public function list($posts = false)
    {
        if (!$posts) {
            $posts = Post::whereNotNull("id")->simplePaginate(2);
        }

        return view("home", [
            'posts' => $posts, "tags" => Label::all()
        ]);
    }


    public function newPost()
    {

        return view("newPost", ['tags' => Label::all()]);
    }

    public function createPost()
    {

        $req = request()->validate([

            "title" => ["required", "min:5", "max:30"],
            "text" => ["required", "min:10"],
            "tags" => ["required"]
        ]);

        /**
         * a select2 számot ad vissza ha a felhasználó már meglevő elemet választ,
         * ha új opciót admeg, akkor a beütött szöveget kapjuk meg.
         */

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

        $post["user_id"] = Auth::id();
        $post["title"] = $req["title"];
        $post["text"] = $req["text"];

        $post = Post::create($post);
        $post->labels()->attach($req["tags"]);

        return redirect("/")->with("post_ok", "Új bejegyzés létrehozva!");
    }

    public function readPost($id)
    {
        $view = view('readpost', ['post' => Post::find($id)]);
        return $this->checkPost($id, $view);
    }

    public function editPostForm($id)
    {
        if (Post::find($id)->labels != null) {

            $usedTags = Post::find($id)->labels;
            $ids = [];
            foreach ($usedTags as $tag) {
                array_push($ids, $tag->id);
            }
        } else {

            $usedTags = null;
        }

        $view = view('editPost', ['post' => Post::find($id), 'tags' => Label::all(), 'usedTags' => $usedTags]);
        return $this->checkPost($id, $view);
    }





    public function editPost()
    {

        $req = request()->validate([

            "title" => ["required", "min:5", "max:30"],
            "text" => ["required", "min:10"],
            "tags" => ["required"],
            "postID" => ["required"]
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

        $post = Post::find($req["postID"]);
        $post->title = $req["title"];
        $post->text = $req["text"];

        $oldLabels = LabelPost::where("post_id", $req["postID"])->get();
        foreach ($oldLabels as $i) {
            $i->delete();
        }
        $post->labels()->attach($req["tags"]);

        $post->update();

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


    public function filterPost()
    {

        $req = request()->validate([

            "labelFilter" => ["required"]

        ]);
        //dd($req);

        return $this->list(Label::find($req["labelFilter"])->posts);
    }
}
