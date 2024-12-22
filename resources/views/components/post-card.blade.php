@props(['post'])

<a href="{{ route('post.show', $post) }}" class="block group">
    <article class="bg-white overflow-hidden transition duration-300">
        @if($post->thumbnail_url)
            <div class="aspect-w-16 aspect-h-9">
                <img
                    src="{{ $post->thumbnail_url }}"
                    alt="{{ $post->title }}"
                    class="w-full h-full object-cover border rounded-lg"
                >
            </div>
        @endif

        <div class="py-4">
            <div class="py-2 text-gray-500 space-x-1">
                <span class="space-x-2">
                     @foreach($post->categories as $category)
                        <span class="hover:text-orange-500">{{ $category->name }}</span>
                    @endforeach
                </span>
                @if ($post->categories->count())
                    <span class="text-xs font-medium text-gray-500">·</span>
                @endif
                <span>{{ $post->created_at->format('d/m/Y') }}</span>
            </div>
            <h2 class="text-lg font-medium text-gray-900 group-hover:text-orange-500">
                {{ $post->title }}
            </h2>

            <p class="mt-2 text-gray-600 line-clamp-3">
                {{ $post->excerpt }}
            </p>
        </div>
    </article>
</a>
