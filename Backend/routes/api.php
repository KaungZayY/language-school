<?php

use App\Http\Controllers\v1\CourseController as v1CourseController;
use App\Http\Controllers\v1\CourseTypeController as v1CourseTypeController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('course-types', [v1CourseTypeController::class, 'index']);

    Route::apiResource('courses', v1CourseController::class);
    // Route::post('courses/{course}', [v1CourseController::class, 'update']);
});