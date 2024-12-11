<?php

use App\Http\Controllers\v1\AuthController as v1AuthController;
use App\Http\Controllers\v1\CourseController as v1CourseController;
use App\Http\Controllers\v1\CourseTypeController as v1CourseTypeController;
use App\Http\Controllers\v1\UserController as v1UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request){
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('course-types', [v1CourseTypeController::class, 'index']);

    Route::apiResource('courses', v1CourseController::class);
    // Route::post('courses/{course}', [v1CourseController::class, 'update']);

    Route::post('register',[v1AuthController::class, 'register']);
    Route::post('login',[v1AuthController::class, 'login']);
    Route::post('logout',[v1AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::post('courses/{id}/apply', [v1UserController::class, 'apply']);
});