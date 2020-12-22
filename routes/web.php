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



Route::get('/', 'App\Http\Controllers\FlappenController@index');





Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth'], function() {

  // Route::get('user/following', 'App\Http\Controllers\UsersController@followIndex');
  Route::get('user/{username?}', 'App\Http\Controllers\UsersController@index');
  Route::get('user/{username}/edit','App\Http\Controllers\UsersController@edit');
  Route::post('user/{username}/edit','App\Http\Controllers\UsersController@update');


  Route::get('user/list', 'App\Http\Controllers\UsersController@index');
  Route::get('user/show', 'App\Http\Controllers\UsersController@show');



  /////
  Route::get('draft/new', 'App\Http\Controllers\PostsController@new');
  Route::post('draft/new', 'App\Http\Controllers\PostsController@create');

  Route::get('post', 'App\Http\Controllers\PostsController@show');
  Route::post('post', 'App\Http\Controllers\PostsController@comment');

  Route::get('post/delete', 'App\Http\Controllers\PostsController@delete');

});
