<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // post listing
    public function index()
    {
        $posts      =   Post::orderBy("id", "desc")->paginate(5);
        return view("welcome", compact("posts"));
    }


    // Create Post 
    public function createPost()
    {
        return view("create-post");
    }

    // Save New Post
    public function savePost(Request $request)
    {

        $postArray      =   array(
            "title"  =>  $request->title,
            "description" => $request->description
        );

        $post  =       Post::create($postArray);

        if (!is_null($post)) {
            return back()->with("success", "Success! Post created");
        } else {
            return back()->with("failed", "Failed! Post not created");
        }
    }
}
