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

Route::get('/', "HomeController@index")->name('home.index');

Route::get('/test', "TestController@index")->name('test.index');

Route::group(['middleware' => 'auth'], function() {
    //NOTE: routes in this function are protected by auth

    Route::get('/publish', 'PostController@create')->name('post.create');
    Route::post('/publish', 'PostController@store');
});

Route::get('/post/{post}', 'PostController@show')->name('post.show');

Auth::routes();
