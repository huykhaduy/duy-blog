@extends('layouts.app')

@section('title', 'Thể loại')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Thể loại</h1>
        <p class="text-xl text-gray-600">Các thể loại bài viết của blog</p>
    </div>

    <!-- Category Count -->
    <div class="mb-8">
        <span class="text-gray-600">{{ $categories->count() }} THỂ LOẠI</span>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($categories as $category)
            <a href="{{ route('archive.index', ['category' => $category->slug]) }}" class="border border-gray-200 block p-6 bg-white rounded-lg hover:shadow-lg transition duration-300">
                <div class="mb-4">
                    <!-- You can add icons here -->
                    <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-gray-100">
                        @if($category->icon_url)
                            <img src="{{ $category->icon_url }}" alt="{{ $category->name }}" class="w-12 h-12 object-cover rounded-lg">
                        @else
                            <!-- Default icon -->
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        @endif
                    </div>
                </div>
                
                <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $category->name }}</h2>
                
                <p class="text-gray-600">
                    {{ $category->posts_count }} bài viết
                </p>
            </a>
        @endforeach
    </div>
</div>
@endsection
