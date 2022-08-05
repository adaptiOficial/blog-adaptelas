<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Auth::routes();

Route::get('/', function () {
   return redirect()->route('blog.index');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => '/blog'
], function () {
    Route::get('/', [PostController::class, 'index'])->name('blog.index');
    Route::post('/post', [PostController::class, 'store'])->name('blog.store');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('blog.delete');
    Route::get('/post/{id}', [PostController::class, 'edit'])->name('blog.edit');
    Route::put('/post/{id}', [PostController::class, 'update'])->name('blog.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


