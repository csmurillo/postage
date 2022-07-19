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
        if((request()->has('search')) && (request()->has('category')) && (request()->has('topic'))){
            $search=request('search');
            $category=request('category');
            $topics=array_filter(explode(',',request('topic')));

            $posts = Post::latest()
            ->where('title','like','%'.$search.'%')
            ->where('content','like','%'.$search.'%')
            ->where('topic',$category)
            ->where(function($query) use($topics){
                foreach($topics as $topic){
                    $query->orWhere('content','like','%'.$topic.'%');
                }
            })->paginate(9);
        }
        else if((request()->has('search')) && !(request()->has('category')) && !(request()->has('topic'))){
            $search=request('search');

            $posts = Post::latest()
            ->where('title','like','%'.$search.'%')
            ->where('content','like','%'.$search.'%')
            ->paginate(9);
        }
        else if((request()->has('search')) && (request()->has('category')) && !(request()->has('topic'))){
            $search=request('search');
            $category=request('category');

            $posts = Post::latest()
            ->where('title','like','%'.$search.'%')
            ->where('content','like','%'.$search.'%')
            ->where('topic',$category)
            ->paginate(9);
        }
        else if((request()->has('search')) && !(request()->has('category')) && (request()->has('topic'))){
            $search=request('search');
            $topics=array_filter(explode(',',request('topic')));

            $posts = Post::latest()
            ->where('title','like','%'.$search.'%')
            ->where('content','like','%'.$search.'%')
            ->where(function($query) use($topics){
                foreach($topics as $topic){
                    $query->orWhere('content','like','%'.$topic.'%');
                }
            })->paginate(9);
        }
        else if((request()->has('category')) && (request()->has('topic'))){
            $category=request('category');
            $topics=array_filter(explode(',',request('topic')));

            $posts = Post::latest()
                ->where('topic',$category)
                ->where(function($query) use($topics){
                    foreach($topics as $topic){
                        $query->orWhere('content','like','%'.$topic.'%');
                    }
                })->paginate(9);
        }
        else if((request()->has('category')) && !(request()->has('topic'))){
            $category=request('category');
            $posts = Post::latest()
                ->where('topic',$category)
                ->paginate(9);
        }
        else if(!(request()->has('category')) && (request()->has('topic'))){
            $topics=array_filter(explode(',',request('topic')));

            $posts = Post::latest()
                ->where(function($query) use($topics){
                    foreach($topics as $topic){
                        $query->orWhere('content','like','%'.$topic.'%');
                    }
                })->paginate(9);
        }
        else{
            $posts = Post::latest()->paginate(9);
        }
        return view('posts.search',[
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store()
    {
        $formData = request()->validate([
            'image' => ['image'],
            'image1' => ['image'],
            'image2' => ['image'],
            'image3' => ['image'],
            'image4' => ['image'],
            'image5' => ['image'],
            'title' => ['required', 'string', 'max:255'],
            'topic' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:4600'],
        ]);    

        if(request()->hasFile('image')){
            $imagePath = request('image')->store('uploads','public');
            $formData['image']=$imagePath;
        }
        if(request()->hasFile('image1')){
            $imagePath1 = request('image1')->store('uploads','public');
            $formData['image1']=$imagePath1;
        }
        if(request()->hasFile('image2')){
            $imagePath2 = request('image2')->store('uploads','public');
            $formData['image2']=$imagePath2;
        }
        if(request()->hasFile('image3')){
            $imagePath3 = request('image3')->store('uploads','public');
            $formData['image3']=$imagePath3;
        }
        if(request()->hasFile('image4')){
            $imagePath4 = request('image4')->store('uploads','public');
            $formData['image4']=$imagePath4;
        }
        if(request()->hasFile('image5')){
            $imagePath5 = request('image5')->store('uploads','public');
            $formData['image5']=$imagePath5;
        }
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
        $this->authorize('update',$post);

        $formData = request()->validate([
            'image' => ['image'],
            'image1' => ['image'],
            'image2' => ['image'],
            'image3' => ['image'],
            'image4' => ['image'],
            'image5' => ['image'],
            'title' => ['required', 'string', 'max:255'],
            'topic' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:4600'],
        ]);    

        if(request()->hasFile('image')){
            $imagePath = request('image')->store('uploads','public');
            $formData['image']=$imagePath;
        }
        if(request()->hasFile('image1')){
            $imagePath1 = request('image1')->store('uploads','public');
            $formData['image1']=$imagePath1;
        }
        if(request()->hasFile('image2')){
            $imagePath2 = request('image2')->store('uploads','public');
            $formData['image2']=$imagePath2;
        }
        if(request()->hasFile('image3')){
            $imagePath3 = request('image3')->store('uploads','public');
            $formData['image3']=$imagePath3;
        }
        if(request()->hasFile('image4')){
            $imagePath4 = request('image4')->store('uploads','public');
            $formData['image4']=$imagePath4;
        }
        if(request()->hasFile('image5')){
            $imagePath5 = request('image5')->store('uploads','public');
            $formData['image5']=$imagePath5;
        }
        $user= auth()->user();
        $formData['user_id']=$user->id;

        $post->update($formData);
        return redirect('/dashboard');
    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);

        $post->delete();
        return redirect('/dashboard');
    }
}




