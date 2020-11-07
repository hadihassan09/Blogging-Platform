<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});


//Posts:
Route::get('/post/create', [PostController::class, 'create'])->name('getCreatePost');
Route::post('/post/store', [PostController::class, 'store'])->name('createPost');
Route::get('/post', [PostController::class, 'index'])->name('posts');
Route::post('/post/like', [PostController::class, 'likePost'])->name('likePost');
Route::get('/post/{post}', [PostController::class, 'show'])->name('showPost');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
