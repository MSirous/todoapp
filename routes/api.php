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

//Route::apiResource('/todoLists', 'TodoLists\TodoListsController');
Route::get('todoLists', 'TodoLists\TodoListsController@index');
Route::get('todoLists/{id}', 'TodoLists\TodoListsController@show');
Route::post('todoLists', 'TodoLists\TodoListsController@store');
Route::put('todoLists/{todo}', 'TodoLists\TodoListsController@update');
Route::delete('todoLists/{todo}', 'TodoLists\TodoListsController@delete');
Route::any('errors', 'TodoLists\TodoListsController@errors');

Route::apiResource('tasks', 'TodoLists\TasksController');
Route::get('todoLists/{todo}/tasks', 'TodoLists\TodoListsController@tasks');


//Route::Resource('/todoLists.task', 'TodoLists\TodoListsController', [
//    'only' => ['store', 'update', 'destroy']
//]);

//Route::group(['prefix'=>'todoList'],function(){
//    Route::apiResource('/{todoList}/reviews','ReviewController');
//});

Route::post('/register', 'Auth\AuthController@register');
Route::post('/login', 'Auth\AuthController@login');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
