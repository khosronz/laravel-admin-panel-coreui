<?php

use Illuminate\Http\Request;
use \App\Http\Resources\User as UserResource;
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
    return new UserResource($request->user());
});

Route::post('login', 'UserAPIController@login');
Route::post('signup', 'UserAPIController@signup');
Route::post('saveProfile/{id}', 'UserAPIController@saveProfile');
Route::resource('users', 'UserAPIController');

Route::resource('roles', 'RoleAPIController');

Route::resource('tickets', 'TicketAPIController');

Route::resource('messages', 'MessageAPIController');
