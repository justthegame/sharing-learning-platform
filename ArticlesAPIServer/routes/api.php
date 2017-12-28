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

Route::get('/article', 'ArticleController@getArticle');
Route::get('/articleWithPictures', 'ArticleController@getArticleWithPictures');
Route::get('/category', 'ArticleController@getCategory');
Route::get('/article/id/{id}', 'ArticleController@getArticleById');
Route::get('/articleWithPictures/id/{id}', 'ArticleController@getArticleWithPicturesById');
Route::get('/article/userid/{id}', 'ArticleController@getArticleByUserID');
Route::get('/article/category/{category}', 'ArticleController@getArticleByCategory');
Route::get('/articleWithPicture/category/{category}', 'ArticleController@getArticleWithPicturesByCategory');
Route::post('/article/insert', 'ArticleController@insertArticle');
Route::post('/article/edit', 'ArticleController@editArticle');
Route::post('/article/delete', 'ArticleController@deleteArticle');
Route::post('/picture/insert', 'ArticleController@insertPicture');
Route::post('/picture/delete', 'ArticleController@deletePicture');