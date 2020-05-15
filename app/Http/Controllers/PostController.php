<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        //$post = New Post;
        //$posts = $post->all();
        return view('lms.posts');
    }
}
