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

Route::get('/', 'WelcomeController@index')->name('welcome');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories','CategoriesController');
Route::resource('post','PostController');
Route::resource('tag','TagController');
Route::middleware(['auth', 'verifyisadmin'])->group(function() {
  Route::get('User','UserController@index');
});
Route::post('User/{user}/makeadmin','UserController@make')->name('makeadmin');
Route::get('User/profile', 'UserController@edit')->name('user.edit-profile');
Route::put('User/profile','UserController@update')->name('user.update');
//});
Route::get('blog/post/{post}','blogpostController@show')->name('blog.show');
