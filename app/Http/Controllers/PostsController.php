<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{    
    public function index()
    {
        $posts = auth()->user()->posts;

        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    public function search(){
        return view('posts.search');
    }

    public function create(){
        return view('posts.create');
    }

    public function store()
    {

        $formData = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'topic' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:1600'],
        ]);    

        $user= auth()->user();

        $formData['user_id']=$user->id;

        Post::create($formData);
        
        return redirect('/dashboard');
    }

    public function show($id){
        $post = Post::findOrFail($id);        
        // pass parameters of url
        return view('posts.show',[
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        $this->authorize('update',$post);
        return view('posts.edit',['post' => $post]);

    }

    public function update(Post $post){
        // dd(request()->title . request()->topic . request()->content);
        $this->authorize('update',$post);

        $formData = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'topic' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:1600'],
        ]); 

        $post->update($formData);

        return redirect('/dashboard');
    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);

        $post->delete();
        return redirect('/dashboard');
    }
}




