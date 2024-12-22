@extends('layouts.app')

@section('title', 'Kết quả tìm kiếm')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="text-center mb-12">
        @if($searchTerm)
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Tìm kiếm cho "{{ $searchTerm }}"</h1>
        @elseif($category)
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Thể loại "{{ $category->name }}"</h1>
        @else
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Tất cả bài viết</h1>
        @endif
        <p class="text-xl text-gray-600">Có {{ $totalPosts }} bài viết phù hợp</p>
    </div>

    <!-- Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <div class="col-span-3 text-center py-12 text-gray-500">
                <span class="mb-12 block text-lg">Không tìm thấy bài viết nào</span>
                <a href="{{ route('home') }}" class="text-orange-500 bg-orange-500/10 px-4 py-2 rounded-md">Trở về trang chủ</a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</div>
@endsection
