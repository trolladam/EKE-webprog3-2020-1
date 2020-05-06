<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view("home.index")
            ->with([
                'posts' => $posts
            ]);
    }
}
