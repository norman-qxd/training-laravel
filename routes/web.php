<?php

use App\Http\Controllers\PostsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostsController::class, 'index'])->name('home');
Route::get('post/{post}', [PostsController::class, 'show']);


Route::get('categories/{category:slug}', function (Category $category){
    return view('posts', [
        'posts' =>  $category->posts,
        'currentCategory' =>  $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author){
    return view('posts', [
        'posts' =>  $author->posts,
        'categories' => Category::all()
    ]);
});


