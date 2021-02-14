<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Article;
use App\Models\Comment;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('article', 'API\ArticleController');


//Route::get('/articles', function () {
//    return Article::all();
//});
//
//Route::post('/article', function () {
//
//    request()->validate([
//        'head' => 'required',
//        'text' => 'required',
//        'user_id' => 'required',
//    ]);
//
//    return Article::create([
//        'head' => request('head'),
//        'text' => request('text'),
//        'user_id' => request('user_id'),
//    ]);
//});
//
//Route::put('/article/{article}', function (Article $article) {
//
//    request()->validate([
//        'head' => 'required',
//        'text' => 'required',
//        'user_id' => 'required',
//    ]);
//
//    $result = $article->update([
//        'head' => request('head'),
//        'text' => request('text'),
//        'user_id' => request('user_id'),
//    ]);
//
//    return ['result' => $result];
//
//});
//
//Route::delete('/article/{article}', function (Article $article) {
//
//    $delete = $article->delete();
//    return ['result' => $delete];
//
//});
//
//Route::post('/comment', function () {
//
//    request()->validate([
//        'article_id' => 'required',
//        'name' => 'required',
//        'text' => 'required',
//    ]);
//
//    return Comment::create([
//        'article_id' => request('article_id'),
//        'name' => request('name'),
//        'text' => request('text'),
//    ]);
//});

