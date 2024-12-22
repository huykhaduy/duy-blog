@extends('layouts.app')

@section('title', $post->title)

@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($post->excerpt), 160) }}">
    <meta name="author" content="{{ config('app.name') }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->excerpt), 160) }}">
    <meta property="og:image" content="{{ $post->thumbnail_url }}">
    <meta property="og:url" content="{{ url()->current() }}">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->excerpt), 160) }}">
    <meta name="twitter:image" content="{{ $post->thumbnail_url }}">
@endsection

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ url()->previous() }}" class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Quay lại
            </a>
        </div>

        <article itemscope itemtype="https://schema.org/BlogPosting">
            <!-- Hidden schema metadata -->
            <meta itemprop="datePublished" content="{{ $post->created_at->toIso8601String() }}">
            <meta itemprop="dateModified" content="{{ $post->updated_at->toIso8601String() }}">
            <meta itemprop="url" content="{{ url()->current() }}">
            @if($post->thumbnail_url)
                <meta itemprop="image" content="{{ $post->thumbnail_url }}">
            @endif
            
            <!-- Article Header -->
            <header class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-4 text-center" itemprop="headline">{{ $post->title }}</h1>
                <div class="text-gray-600 text-center">
                    <time datetime="{{ $post->created_at->toIso8601String() }}">
                        Ngày đăng: {{ $post->created_at->format('d/m/Y') }}
                    </time>
                </div>
                <div class="my-4 flex justify-center">
                    @foreach($post->categories as $category)
                        <a href="{{ route('archive.index', ['category' => $category->slug]) }}" class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2" itemprop="articleSection">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
                @if($post->thumbnail_url)
                    <div class="aspect-w-16 aspect-h-9 mb-6">
                        <img 
                            src="{{ $post->thumbnail_url }}" 
                            alt="{{ $post->title }}" 
                            class="w-full h-full object-cover rounded-lg"
                        >
                    </div>
                @endif
            </header>

            <!-- Article Content -->
            <div class="prose prose-lg max-w-none" itemprop="articleBody">
                {!! $post->content !!}
            </div>

            <!-- Author info (if available) -->
            @if($post->author)
                <div class="mt-8" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <meta itemprop="name" content="{{ $post->author->name }}">
                </div>
            @endif

            <!-- Publisher info -->
            <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                <meta itemprop="name" content="{{ config('app.name') }}">
                <!-- Add your logo URL if available -->
                {{-- <meta itemprop="logo" content="{{ asset('logo.png') }}"> --}}
            </div>
        </article>
    </div>

    <!-- JSON-LD Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "{{ $post->title }}",
        "description": "{{ Str::limit(strip_tags($post->excerpt), 160) }}",
        "image": "{{ $post->thumbnail_url }}",
        "datePublished": "{{ $post->created_at->toIso8601String() }}",
        "dateModified": "{{ $post->updated_at->toIso8601String() }}",
        "author": {
            "@type": "Organization",
            "name": "{{ config('app.name') }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "{{ config('app.name') }}"
        },
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ url()->current() }}"
        }
    }
    </script>
@endsection
