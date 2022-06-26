<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{    
    public function index(){
        return view('post.index');
    }

    public function search(){
        return view('post.search');
    }

    public function create(){
        return view('post.create');
    }

    public function store(){
        return "SUCCESS";
    }

    public function show(){
        // pass parameters of url
        return view('post.show');
    }

    public function edit(){
        return view('post.edit');
    }

    public function update(){
        return "SUCCESS";
    }

    public function destroy(){
        return "SUCCESS";
    }
}


