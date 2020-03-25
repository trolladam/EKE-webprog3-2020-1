<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    function index()
    {
        $posts = Post::all();

        return view("home.index")
            ->with([
                'posts' => $posts
            ]);
    }
}
