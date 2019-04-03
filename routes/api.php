<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Use App\Article;
Route::get('article', 'ArticleController@index');
Route::get('article/{id}', 'ArticleController@articleApiGetById');
Route::post('article', 'ArticleController@articleApiCreate');
Route::put('article/{id}', 'ArticleController@articleApiUpdate');
Route::delete('article/{id}', 'ArticleController@articleApiDelete');
Route::patch('article/{id}', 'ArticleController@articleApiPatch');
