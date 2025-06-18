<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        $posts = Post::all(); //select * from posts
        // filter Post::where('title', 'like', '%Laravel%')->get(); | select * from posts where title like '%Laravel%'
        // filter Post::where('title', 'like', '%Laravel%')->first(); | select * from posts where title like '%Laravel%' limit 1
        // filter Post::find(1); | select * from posts where id = 1
        return view('posts.index', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // http GET
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //http POST
    {

        $post = Post::create($request->all());

        return redirect()->route('posts.show', $post);
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post) //http GET
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) // http GET
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post) // http PUT/PATCH
    {
        //$post = Post::findOrFail($post->id); // Ensure the post exists, otherwise throw a 404 error

        // post->update() is not a method to update the post, it is used to update the post in the database. returns boolean.
        // tap($post)->update() is a method to update the post in the database and return the updated post or the model.

        $post = tap($post)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) // http DELETE
    {
        $post->delete(); // This will delete the post from the database

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
