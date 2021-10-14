<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Rutas de Post
Route::get('/',[PostController::class,'index'])->name('posts.index');
Route::get('posts/{post:slug}',[PostController::class,'show'])->name('posts.show');
Route::get('category/{category:slug}',[PostController::class,'category'])->name('posts.category');
Route::get('tag/{tag:slug}',[PostController::class,'tag'])->name('posts.tag');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
