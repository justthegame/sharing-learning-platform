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

Route::get('/keyword', 'KeywordController@getKeyword');
Route::get('/keyword/id/{id}', 'KeywordController@getKeywordById');
Route::get('/keyword/category/{category}', 'KeywordController@getKeywordByCategory');
Route::get('/category', 'KeywordController@getCategory');
Route::post('/keyword/insert', 'KeywordController@insertKeyword');
Route::post('/keyword/edit', 'KeywordController@editKeyword');
Route::post('/keyword/delete', 'KeywordController@deleteKeyword');