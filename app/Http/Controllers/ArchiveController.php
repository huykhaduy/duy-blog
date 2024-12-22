<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('categories');

        // Search by text
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('content', 'like', "%{$searchTerm}%")
                  ->orWhere('excerpt', 'like', "%{$searchTerm}%");
            });
        }

        // Filter by category
        if ($request->has('category')) {
            $categorySlug = $request->category;
            $query->whereHas('categories', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });

            $category = Category::where('slug', $categorySlug)->first();
        }

        // Get paginated posts
        $posts = $query->latest()->paginate(12);

        return view('archive', [
            'posts' => $posts,
            'searchTerm' => $request->search,
            'category' => $category ?? null,
            'selectedCategory' => $request->category,
            'totalPosts' => $posts->total()
        ]);
    }
} 