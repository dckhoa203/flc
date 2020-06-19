<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
Use App\Models\Center;

class HomeController extends Controller
{
    public function index()
    {
        $post = Post::where('status', 1)->orderByDesc('post_id')->limit(5)->get();
        $center = Center::limit(3)->get();

        return view('home', \compact('post', 'center'));
    }

    public function show_post($post_id)
    {
        $data = Post::where('post_id', $post_id)->first();

        return view('show_post', \compact('data'));
    }
}
