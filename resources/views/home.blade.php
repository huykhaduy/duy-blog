@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
    <!-- Container for Featured Post -->
    <x-container>
        <h1 class="mb-4 font-medium text-xl">Bài viết nổi bật</h1>
        <x-featured-post :featuredPosts="$featuredPosts" class="mb-8" />
        @livewire('tab-content')
    </x-container>

@endsection

