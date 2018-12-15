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

Route::apiResource('/todoLists', 'TodoList\TodoListsController');
Route::group(['prefix'=>'todoList'],function(){
    Route::apiResource('/{todoList}/reviews','ReviewController');
});




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
