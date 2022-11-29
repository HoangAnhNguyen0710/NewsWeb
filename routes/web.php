<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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



Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/blog-category/{category_id}', [CategoryController::class, 'index']);
Route::get('/article/{id}', [ArticleController::class, 'getOneArticle'])->where('id', '[0-9]+');

Route::middleware('auth')->group(function() {
    Route::get('/post-article', [ArticleController::class, 'index'])->name('post-article');
    Route::get('/update-article/{id}', [ArticleController::class, 'update'])->name('update-article');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin-page');
});