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

Route::post('/article/insert', 'KeywordController@insertArticle');
Route::post('/article/edit', 'KeywordController@editArticle');
Route::post('/article/delete', 'KeywordController@deleteArticle');
Route::post('/picture/delete', 'KeywordController@deletePicture');