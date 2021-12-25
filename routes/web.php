<?php

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
Route::group(['middleware' => 'auth'], function(){
 Route::get('/', 'PostController@index');
 Route::get('/posts/create', 'PostController@create');
 Route::post('/posts', 'PostController@store');
 Route::get('/posts/{post}', 'PostLikeController@index');
 Route::get('/posts/{post}/edit', 'PostController@edit');
 Route::put('/posts/{post}', 'PostController@update');
 Route::delete('posts/{post}', 'PostController@delete');
 Route::get('/user', 'UserController@index');
 Route::post('/comments/{post}', 'CommentController@store');
 Route::get('/comments/{post}/create', 'CommentController@create');
 Route::post('/users/{user}/store', 'LikeUserController@store');
 Route::post('/users/{user}/destroy', 'LikeUserController@destroy');
 Route::get('/users/{user}', 'LikeUserController@index');
 Route::get('/user/rank', 'UserRankController@index');
 Route::get('/book', 'BookController@index');
 Route::post('/users/{post}/store', 'PostLikeController@store');
 Route::post('/users/{post}/destroy', 'PostLikeController@destroy');

 

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
