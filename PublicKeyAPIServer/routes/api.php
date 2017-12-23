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

use App\Http\Resources\Publickey as PublickeyResource;
use App\Publickey;

Route::get('/getKey/{user}', function ($user) {
    return new PublickeyResource(Publickey::where('user', $user)->first());
});

Route::get('/key/{user}/{key}', 'PublickeyController@insert');
