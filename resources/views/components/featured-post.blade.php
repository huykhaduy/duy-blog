@props(['featuredPosts'])

<section class="max-w-7xl mx-auto py-2">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        @foreach($featuredPosts as $index => $post)
            @if($index === 0)
                <a class="col-span-2" href="{{ route('post.show', $post->slug) }}">
                    <!-- Main Featured Post -->
                    <article
                        class="group bg-white overflow-hidden transition-shadow duration-300"
                        x-data="{ hover: false }"
                        @mouseenter="hover = true"
                        @mouseleave="hover = false"
                    >
                        <div class="relative h-72">
                            <img
                                src="{{ $post->thumbnail_url }}"
                                alt="{{ $post->title }}"
                                class=" rounded-lg w-full h-full object-cover transform transition-transform duration-300"
                            >
                        </div>
                        <div class="py-6">
                            <h2 class="group-hover:text-orange-600 text-2xl font-medium text-gray-900 mb-3 line-clamp-2">
                                {{ $post->title }}
                            </h2>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </article>
                </a>
            @else
                @if($index === 1)
                    <!-- Secondary Featured Posts -->
                    <div class="col-span-2 space-y-6">
                @endif
                <a href="{{ route('post.show', $post->slug) }}">
                    <article
                        class="group bg-white overflow-hidden transition-shadow duration-300"
                        x-data="{ hover: false }"
                        @mouseenter="hover = true"
                        @mouseleave="hover = false"
                    >
                        <div class="flex h-28">
                            <div class="flex-shrink-0 aspect-video relative">
                                <img
                                    src="{{ $post->image }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-full rounded-lg object-cover transform transition-transform duration-300"
                                >
                            </div>
                            <div class="flex-1 p-4 self-center">
                                <h3 class="group-hover:text-orange-600 text-lg font-medium text-gray-900 line-clamp-2">
                                    {{ $post->title }}
                                </h3>
                            </div>
                            </div>
                        </article>
                </a>
                @if($loop->last)
                    </div>
                @endif
            @endif
        @endforeach
    </div>
</section>
