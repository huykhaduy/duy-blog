<header x-data class="bg-white shadow-sm">
    <div x-data class="container max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img class="w-8 h-8 rounded-full" src="https://avatars.githubusercontent.com/u/88472007?v=4" />
                <span class="text-lg font-bold">{{ config('app.name') }}</span>
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="ml-12 hidden md:flex space-x-3">
            <x-nav-link
                href="{{ route('home') }}"
                :active="request()->routeIs('home')">
                Bài viết
            </x-nav-link>

            <x-nav-link
                href="{{ route('category.index') }}"
                :active="request()->routeIs('category.index')">
                Thể loại
            </x-nav-link>

            <x-nav-link
                href="{{ route('about') }}"
                :active="request()->routeIs('about')">
                Giới thiệu
            </x-nav-link>
        </nav>

        <!-- Mobile Navigation -->
        <div
            x-data="{ open: false }"
            @toggle-nav.window="open = !open"
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="absolute top-16 left-0 right-0 bg-white shadow-lg md:hidden z-50"
        >
            <div class="px-4 py-3 pb-6 space-y-1">
                <x-nav-link
                    href="{{ route('home') }}"
                    :active="request()->routeIs('home')"
                    class="block px-3 py-2">
                    Bài viết
                </x-nav-link>

                <x-nav-link
                    href="{{ route('category.index') }}"
                    :active="request()->routeIs('category.index')"
                    class="block px-3 py-2">
                    Thể loại
                </x-nav-link>

                <x-nav-link
                    href="{{ route('about') }}"
                    :active="request()->routeIs('about')"
                    class="block px-3 py-2">
                    Giới thiệu
                </x-nav-link>


                <a href="{{ route('home') }}" class="block px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition duration-300">
                    Liên hệ
                </a>


            </div>
        </div>

        <!-- Right Side Navigation -->
        <div x-data="{ searchOpen: false }"  x-effect="console.log(open)" class="flex items-center">
            <!-- Search Button -->
            <button
                @click="searchOpen = true"
                class="p-2 text-gray-600 hover:text-gray-900"
            >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>

            <!-- Search Popup -->
            <div
                x-data
                x-show="searchOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @keydown.escape.window="searchOpen = false"
                class="fixed inset-0 z-50 overflow-y-auto"
                style="display: none;"
            >
                <!-- Dark overlay -->
                <div
                    x-data
                    class="fixed inset-0 bg-black bg-opacity-50"
                ></div>

                <!-- Search modal -->
                <div class="relative min-h-screen flex items-center justify-center p-4">
                    <div
                        x-data
                        class="relative bg-white rounded-lg w-full max-w-2xl p-6"
                        @click.outside="searchOpen = false"
                    >
                        <!-- Close button -->
                        <!-- <button
                            @click="searchOpen = false"
                            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700"
                        >
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button> -->

                        <!-- Search form -->
                        <form action="{{ route('archive.index') }}" method="GET">
                            <div class="flex items-center border-b-2 border-gray-300">
                                <input
                                    type="text"
                                    name="search"
                                    placeholder="Tìm kiếm bài viết..."
                                    class="w-full px-4 py-3 text-lg focus:outline-none"
                                    @keydown.enter="$event.target.form.submit()"
                                >
                                <button type="submit" class="p-3 text-gray-500 hover:text-gray-700">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <a href="https://www.facebook.com/huykhaduy/" class="hidden md:inline-block ml-4 px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition duration-300">
                Liên hệ
            </a>

            <button
                x-data
                @click="$dispatch('toggle-nav')"
                class="md:hidden p-2 text-gray-600 hover:text-gray-900"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</header>
