<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\LikeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth')->group(function() {
   Route::get('/user', [UserController::class, 'getUser']);
   Route::post('/article', [ArticleController::class, 'postArticle']);
   Route::get('/article', [ArticleController::class, 'getArticleList']);
   Route::post('/like', [LikeController::class, 'likeOrUnlike']);
   Route::get('/like/{article_id}', [LikeController::class, 'getLikeNum']);
// });