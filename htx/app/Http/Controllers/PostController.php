<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function read()
    {
        $post = Post::all();
        return $post;
    }
      public function add()
    {
    return view('test.test');
    }
}