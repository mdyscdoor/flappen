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

  Route::get('user/{username?}', 'App\Http\Controllers\UsersController@index');
  Route::get('user/list', 'App\Http\Controllers\UsersController@index');
  Route::get('user/following', 'App\Http\Controllers\UsersController@followIndex');
  Route::get('user/show', 'App\Http\Controllers\UsersController@show');

});
