<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Get post at home and pagination, filter by category
        $posts = Post::published()->latest()->paginate(10);
        $featuredPosts = Post::published()->featured()->orderBy('sort_order', 'desc')->take(4)->get();
        return view('home', compact('posts', 'featuredPosts'));
    }

    public function show($slug)
    {
        // Get post by slug
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        return view('detail', compact('post'));
    }

    public function search(Request $request)
    {
        // Get post by search keyword
        config()->setLocale('vi');
        return view('post.index');
    }
}
