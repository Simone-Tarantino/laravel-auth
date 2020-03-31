<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('guest/index', 'PostController@index')->name('index');
Route::get('guest/show/{slug}', 'PostController@show')->name('show');

Route::post('/comments/create', 'CommentController@store')->name('comments.store');

Auth::routes();



Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('posts', 'PostController');
    });