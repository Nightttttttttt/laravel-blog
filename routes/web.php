<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/articles', function () {
//     return 'Article List';
// });


// Route::get('/articles/detail', function () {
//     return 'Article Detail';
// })-> name('articles.detail');


// Route::get('/articles/more', function () {
//     return redirect() -> route('articles.detail');
// });


// Route::get('/articles/detail/{id}', function ($id) {
//     return "Article Detail - $id";
// });

/* Article Route */
Route::get('/', 'ArticleController@index');
Route::get('/articles', 'ArticleController@index');
Route::get('/articles/detail/{id}', 'ArticleController@detail');
Route::get('/articles/add', 'ArticleController@add');
Route::post('/articles/add', 'ArticleController@create');
Route::get('/articles/delete/{id}', 'ArticleController@delete');

/* Comment Route */
Route::post('/comments/add', 'CommentController@create');
Route::get('/comments/delete/{id}', 'CommentController@delete');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
