<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\TagController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//

Route::post('/login', [UserController::class, 'login']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/user', [UserController::class, 'user']);
    Route::get('tasks/user_tasks', [TaskController::class, 'user_tasks']);
    Route::get('tasks/get_hours', [TaskController::class, 'get_hours']);
    Route::get('tasks/filter_tasks_by_category', [TaskController::class, 'filter_tasks_by_category']);
    Route::get('tasks/filter_tasks_by_category_time', [TaskController::class, 'filter_tasks_by_category_time']);
    Route::get('tags/user_tags', [TagController::class, 'user_tags']);
});

Route::apiResource('tasks', TaskController::class)->middleware('auth:api');
Route::apiResource('tags', TagController::class)->middleware('auth:api');
