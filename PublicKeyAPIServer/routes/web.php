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

//use App\Http\Resources\Publickey as PublickeyResource;
//use App\Publickey;
//
//Route::get('/getKey/{user}', function ($user) {
//    return new PublickeyResource(Publickey::where('user', $user)->first());
//});
//
//Route::get('key/{user}/{key}', 'PublickeyController@insert');
