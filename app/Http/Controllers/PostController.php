<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Topic;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        //TODO: deafult function - list of post
    }

    public function create()
    {
        $topics = Topic::all();

        return view('posts.create')
            ->with([
                'topic_options' => $topics
            ]);
    }

    public function store(PostRequest $request)
    {
        $post = Auth::user()
            ->posts()
            ->create($request->post);

        return redirect()
            ->route('post.show', ['post' => $post]);
    }

    public function show(Post $post)
    {
        dd($post);
        //TODO: post details
    }

    public function edit($id)
    {
        //TODO: show post edit form
    }

    public function update($id)
    {
        //TODO: update post
    }

    public function destory($id)
    {
        //TODO: delete the post
    }
}
