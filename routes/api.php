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

Route::prefix('/test')->group(function () {
    Route::post('user/{user_id}/actions', 'ActionController@store');
    Route::post('user/{user_id}/actions/{action_id}/tasks', 'ActionController@storeLists');
    Route::post('register', 'Api\AuthController@register');
    Route::post('login', 'Api\AuthController@login');

    Route::get('user/{user_id}/actions', 'ActionController@show');
    // Route::get('user/{user_id}/actions/{action_id}', 'ActionController@getActionById'); // poka chto ne nujno
    Route::get('user/{user_id}/actions/{action_id}/tasks', 'ActionController@getTasksbyID');

    Route::patch('user/{user_id}/actions/{action_id}', 'ActionController@actionUpdate');
    Route::patch('user/{user_id}/actions/{action_id}/tasks/{task_id}', 'ActionController@taskUpdate');

    Route::delete('user/{user_id}/actions/{action_id}', 'ActionController@actionDestroy');
    Route::delete('user/{user_id}/actions/{action_id}/tasks/{task_id}', 'ActionController@actionTaskDestroy');
});
