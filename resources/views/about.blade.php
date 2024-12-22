@extends('layouts.app')

@section('title', 'Giới thiệu')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Hero Section -->
    <div class="text-center mb-8">
        <img 
            src="{{ asset('images/img.jpg') }}" 
            alt="Your Name" 
            class="w-48 h-48 rounded-full mx-auto mb-8 shadow-lg object-cover"
        >
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Huỳnh Khánh Duy</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Web Developer & Technology Enthusiast
        </p>
    </div>

    <!-- About Me Section -->
    <div class="bg-white rounded-2xl shadow-lg p-8 mb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Về bản thân</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="prose lg:prose-lg">
                <p>
                    - Tốt nghiệp tại trường Đại học Sài Gòn với chuyên ngành Kỹ thuật phần mềm (03/2025). GPA: 3.67/4.0
                    <br>
                    - Tôi là một lập trình viên có niềm đam mê lớn với công nghệ. Thích giải quyết các vấn đề và tìm kiếm các giải pháp hiệu quả.
                    <br>
                    - Các ngôn ngữ lập trình và framework sử dụng: PHP & Laravel, Python, Java & Spring Boot, C#, Reactjs, Vuejs
                </p>
                <p class="mt-4">
                    - Nếu bạn có nhu cầu hợp tác, vui lòng liên hệ với tôi thông qua các phương thức liên hệ bên dưới.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img 
                    src="{{ asset('images/img_1.jpg') }}" 
                    alt="About Me 1" 
                    class="max-w-full md:w-64 rounded-lg shadow-md hover:shadow-xl transition duration-300"
                >
                <img 
                    src="{{ asset('images/img_2.jpg') }}" 
                    alt="About Me 2" 
                    class="max-w-full md:w-64 rounded-lg shadow-md hover:shadow-xl transition duration-300"
                >
            </div>
        </div>
    </div>

    <!-- Social Media Section -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <!-- YouTube -->
        <a href="https://www.youtube.com/@duydev.official" 
           class="group bg-white rounded-xl shadow-md p-6 flex items-center hover:shadow-xl transition duration-300">
            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 group-hover:text-red-500 transition duration-300">YouTube</h3>
                <p class="text-sm text-gray-600">Subscribe to my channel</p>
            </div>
        </a>

        <!-- TikTok -->
        <a href="https://www.tiktok.com/@duy_it.official" 
           class="group bg-white rounded-xl shadow-md p-6 flex items-center hover:shadow-xl transition duration-300">
            <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 group-hover:text-pink-500 transition duration-300">TikTok</h3>
                <p class="text-sm text-gray-600">Follow me on TikTok</p>
            </div>
        </a>

        <!-- Facebook -->
        <a href="https://www.facebook.com/huykhaduy/" 
           class="group bg-white rounded-xl shadow-md p-6 flex items-center hover:shadow-xl transition duration-300">
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition duration-300">Facebook</h3>
                <p class="text-sm text-gray-600">Follow me on Facebook</p>
            </div>
        </a>

        <!-- GitHub -->
        <a href="https://github.com/huykhaduy" 
           class="group bg-white rounded-xl shadow-md p-6 flex items-center hover:shadow-xl transition duration-300">
            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-gray-900" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 group-hover:text-gray-600 transition duration-300">GitHub</h3>
                <p class="text-sm text-gray-600">Check out my projects</p>
            </div>
        </a>
    </div>

    <!-- Contact Section -->
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Email cá nhân</h2>
        <div class="flex items-center justify-center space-x-4">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <a href="mailto:your.email@example.com" class="text-lg text-blue-600 hover:text-blue-800 transition duration-300">
                huykhaduy@gmail.com
            </a>
        </div>
    </div>
</div>
@endsection
