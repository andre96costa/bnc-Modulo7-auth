<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $response = Gate::inspect('create', Post::class);
        
        if ($response->allowed())
            return view('posts.create');

        return redirect()->back()->withErrors(['permission' => 'Permissão negada!']);
    }

    public function store(PostStoreRequest $request)
    {
       $request->user()->posts()->create($request->all());
    
       return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
       $post->title = $request->get('title');
       $post->body = $request->get('body');
       $post->save();

       return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
