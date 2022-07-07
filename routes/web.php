<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('blogs', [
        'blogs' => Blog::latest()->get(),
    ]);
});

Route::get('/blog/{blog:slug}', function (Blog $blog) {
    return view('blog', [
        'blog' => $blog
    ]);
})->where('blog', '[A-z\d\-_]+');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'blogs' => $category->blogs
    ]);
})->where('blog', '[A-z\d\-_]+');

Route::get('/users/{user:username}', function (User $user) {
    return view('blogs', [
        'blogs' => $user->blogs
    ]);
})->where('blog', '[A-z\d\-_]+');
