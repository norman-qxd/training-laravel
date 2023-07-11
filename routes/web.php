<?php

use App\Http\Controllers\PostsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostsController::class, 'index'])->name('home');
Route::get('post/{post}', [PostsController::class, 'show']);
