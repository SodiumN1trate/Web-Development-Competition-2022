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

// User
Route::middleware('auth:api')->get('/user', [UserController::class, 'user']);
Route::middleware('auth:api')->post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);


Route::apiResource('tasks', TaskController::class)->middleware('auth:api');
Route::apiResource('tags', TagController::class)->middleware('auth:api');
