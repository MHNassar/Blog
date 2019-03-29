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


Route::namespace('Admin')->middleware("auth")
    ->prefix('admin')->group(function () {
        Route::get('/home', 'HomeController@index');
        Route::resource('posts', 'PostController');
        Route::resource('imprints', 'ImprintController')->only(['index', 'edit', 'update', 'show']);;
    });


Route::namespace('Website')->group(function () {
    Route::get('/', 'HomeController@indexPage');
    Route::get('imprint', 'HomeController@getimprintPage');
    Route::get('author/{id}', 'HomeController@getAuthorPosts');
    Route::get('post/{id}', 'HomeController@getPostDetails');

});



