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

Route::group(['middleware' => 'cors'], function(){
    Route::post('auth_login', 'UserController@UserAuth');
    
    Route::group(['middleware' => 'jwt.auth'], function(){
        Route::apiResource('users', 'UserController');
        Route::apiResource('groups', 'GroupController');
        Route::apiResource('occupations', 'OccupationController');
    });
});