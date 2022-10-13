<?php

use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\LessonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post( 'login', [AuthController::class, 'login'] );
Route::get( 'courses', [ApiController::class, 'courses'] );
Route::get( 'course/{id}', [ApiController::class, 'courseSingle'] );


// secure routes
Route::middleware(['auth:api'])->group(function () {
    Route::get('lessons', [LessonController::class, 'lessons']);
});
