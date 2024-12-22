<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/danh-muc/{slug}', [PostController::class, 'category'])->name('category.show');
Route::get('/danh-muc', [CategoryController::class, 'index'])->name('category.index');
Route::get('/tim-kiem', [ArchiveController::class, 'index'])->name('archive.index');
Route::get('/lien-he', [PostController::class, 'contact'])->name('contact');
Route::get('/gioi-thieu', [AboutController::class, 'about'])->name('about');
Route::get('/{slug}', [PostController::class, 'show'])->name('post.show');
