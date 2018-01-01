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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::any('/', 'HomeController@index')->name('home');
Route::any('/single/{id}', 'HomeController@single')->name('single');
Route::any('/news/{category}', 'HomeController@news')->name('news');
//Route::any('/home2', 'HomeController@index2')->name('home2');
Route::any('/showArticle', 'ArticleController@showArticle')->name('showArticle');
Route::any('/showConversation', 'ConversationController@showConversation')->name('showConversation');
Route::any('/article/insert','ArticleController@insertArticle');
Route::any('/conversation/insert','ConversationController@insertConversation');

