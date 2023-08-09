<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'auth:sanctum'
], function () {
    Route::apiResource('tasks', TasksController::class);
    Route::get('users', [AuthController::class, 'index']);
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('auth:sanctum');
    Route::post('register', [AuthController::class, 'register'])->withoutMiddleware('auth:sanctum');
    Route::post('logout', [AuthController::class, 'logout']);
});