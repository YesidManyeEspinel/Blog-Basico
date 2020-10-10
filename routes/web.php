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
Route::get('/', function () {
    return view('public.templete.app'); 
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ViewArticlesController@index');
Route::get('/articulo/{id}', 'ViewArticlesController@show')->name('articulo.show');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('users','UsersController')->middleware('admin');
    Route::get('users/{id}/destroy',[
    	'uses'=>'UsersController@destroy',
    	'as'=>'admin.users.destroy'
    ]);

    Route::resource('categories','CategoriesController');

    Route::resource('tags','TagsController');

    Route::resource('articles','ArticlesController');

    Route::get('images',[
    	'uses'=>'ArticlesController@showimage',
    	'as'=>'images.showimage'
    ]);
    
});