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

Auth::routes();

Route::get('/', "HomeController@index")->name('home.index');

Route::get('/test', "TestController@index")->name('test.index');

Route::get('/post/{post}', 'PostController@show')->name('post.show');

Route::get('/topic/{topic}', 'TopicController@show')->name('topic.show');

Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');


Route::group(['middleware' => 'auth'], function() {
    //NOTE: routes in this function are protected by auth

    Route::get('/publish', 'PostController@create')->name('post.create');
    Route::post('/publish', 'PostController@store');

    Route::get('/update-post/{post}', 'PostController@edit')->name('post.edit');
    Route::post('/update-post/{post}', 'PostController@update');

    Route::post('/delete-post/{post}', 'PostContoller@destory')->name('post.delete');

    Route::post('/comment-post/{post}', 'PostController@comment')->name('post.comment');

    Route::post('/comment-reply/{comment}', 'CommentController@comment')->name('comment.reply');
});
