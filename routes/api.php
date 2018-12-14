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

date_default_timezone_set('America/Bogota');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors'], function(){
    Route::post('auth_login', 'UserController@UserAuth');
    
    Route::group(['middleware' => 'jwt.auth'], function(){
        Route::apiResource('users', 'UserController');
        Route::apiResource('groups', 'GroupController');
        Route::apiResource('occupations', 'OccupationController');
        Route::apiResource('tasks', 'TaskController');
        Route::apiResource('projects', 'ProjectController');
        Route::apiResource('sections', 'SectionController');
        Route::apiResource('color-projects', 'ColorProjectController');
        Route::apiResource('states', 'StateController');

        Route::get('user_tasks/{id}', 'UserController@userTasks');
        Route::get('cant/users/by-group', 'UserController@cantUsersByGroup');
        Route::post('users/groups', 'UserController@usersByGroups');



        Route::get('sections_project/{id}', 'SectionController@returnSectionsProject');
    });
});