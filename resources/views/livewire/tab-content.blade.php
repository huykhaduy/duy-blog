<div>
    <!-- Display list categories in the -->
    <div class="flex flex-wrap gap-2">
        @foreach ($categories as $category)
            <div class="relative after:-bottom-2 after:left-0 after:right-0 after:h-[2px] after:w-[40px] after:bg-gray-800 after:mx-auto cursor-pointer px-3 py-1 rounded-full hover:bg-gray-100 transition duration-300 {{ ($activeCategoryId == $category->id)  ? 'bg-gray-100 border border-gray-200 after:absolute' : 'text-gray-600' }}" wire:click="setActiveCategoryId('{{ $category->id }}')">{{ $category->name }}</div>
        @endforeach
        <hr class="w-full">
    </div>

    <!-- Display list posts -->
    <div id="posts" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>

    <!-- Empty posts -->
    @if ($posts->isEmpty())
        <div class="text-center text-gray-500">Không tìm thấy bài viết nào</div>
    @endif

    <!-- Pagination -->
    {{ $posts->links(data: ['scrollTo' => 'posts']) }}
</div>
