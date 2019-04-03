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

Route::get('/', function () {
    return view('welcome');
});

//CRUD

Route::get('article/add', 'ArticleController@add')->name('add')->middleware('auth');
Route::post('article/store', 'ArticleController@store')->name('store')->middleware('auth');
Route::get('article/edit/{id}', 'ArticleController@edit')->name('edit')->middleware('auth');
Route::post('article/update/{id}', 'ArticleController@update')->name('update')->middleware('auth');
Route::get('article/delete/{id}', 'ArticleController@delete')->name('delete')->middleware('auth');

//API

Route::get('article', 'ArticleController@index');
Route::get('article/{id}', 'ArticleController@articleApiGetById');
Route::post('article', 'ArticleController@articleApiCreate');
Route::put('article/{id}', 'ArticleController@articleApiUpdate');
Route::delete('article/{id}', 'ArticleController@articleApiDelete');

Route::resource('article', 'ArticleController')->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/search', 'HomeController@search')->name('search');