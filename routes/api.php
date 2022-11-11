<?php

use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\LessonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post( 'login', [AuthController::class, 'login'] );
Route::get( 'courses', [ApiController::class, 'courses'] );
Route::get( 'course/{slug}', [ApiController::class, 'courseSingle'] );
Route::get( 'category/{id}', [ApiController::class, 'category'] );

Route::get('review', [ApiController::class, 'review']);

// secure routes
Route::middleware(['auth:api'])->group(function () {
    Route::post('enroll/{slug}', [ApiController::class, 'enrollCourse']);
    Route::get('lessons', [LessonController::class, 'lessons']);
    Route::get('/user', function () {
        return Auth::user();
    });
});
