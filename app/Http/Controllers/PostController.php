<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Topic;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        //TODO: deafult function - list of post
    }

    // http GET - /publish
    public function create()
    {
        $topics = Topic::orderBy('title', 'asc')->get();

        return view('posts.create')
            ->with([
                'topic_options' => $topics
            ]);
    }

    // http POST - /publish
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
        return view('posts.show')
            ->with(compact('post'));
    }

    // http GET - /update-post/{post}
    public function edit(Post $post)
    {
        $topics = Topic::orderBy('title', 'asc')->get();

        return view('posts.edit')->with(compact('post', 'topics'));
    }

    // http POST - /update-post/{post}
    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->post);

        return redirect()
            ->route('post.show', ['post' => $post]);
    }

    // http POST - /delete-post/{post}
    public function destory(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('home.index');
    }
}
