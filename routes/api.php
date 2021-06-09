<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix'=>'projects'], function(){
    Route::get('/', 'ProjectsController@index');
    Route::post('/', 'ProjectsController@store');
    Route::get('/{id}', 'ProjectsController@show');
    Route::patch('/{id}', 'ProjectsController@update');
    Route::delete('/{id}', 'ProjectsController@destroy');
});