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

Route::get('/','VidozController@welcome');

Auth::routes();

// Route::get('/dashboard', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
Route::resource('admin/posts', 'Admin\\postsController');
Route::resource('admin/posts', 'Admin\\PostsController');
Route::resource('admin/posts', 'Admin\\PostsController');
Route::resource('admin/comments', 'App\Http\Controllers\Admin\\CommentsController');
Route::resource('admin/comments', 'Admin\\CommentsController');
Route::resource('admin/comments', 'Admin\\CommentsController');
Route::get('user/comment/save', 'Admin\CommentsController@storeComment');
Route::get('user/comment/likes', 'Admin\CommentsController@storeLike');
Route::get('user/comment/dislikes', 'Admin\CommentsController@storeDisLike');
Route::resource('admin/likes', 'Admin\\LikesController');
Route::resource('admin/dislikes', 'Admin\\DislikesController');