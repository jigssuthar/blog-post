<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostControllerApi;
// Example: A simple API route for posts
// Route::get('posts', [PostControllerApi::class, 'index']); // Get all posts
// Route::get('posts/{id}', [PostControllerApi::class, 'show']); // Get a single post
// Route::post('posts', [PostControllerApi::class, 'store']); // Store a new post
// Route::put('posts/{id}', [PostControllerApi::class, 'update']); // Update a post
// Route::delete('posts/{id}', [PostControllerApi::class, 'destroy']); // Delete a post

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('posts', PostControllerApi::class);
});

Route::middleware('auth:sanctum', 'role:admin')->group(function () {
    Route::resource('users', UserController::class);
});