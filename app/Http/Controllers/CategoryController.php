<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')
            ->orderByDesc('posts_count')
            ->get();

        return view('category', compact('categories'));
    }

    public function show($slug)
    {
        // Get category by slug, pagination
        return view('category.show');
    }
}
