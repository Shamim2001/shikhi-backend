<?php

use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\LessonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth:api'])->group(function () {
    Route::post( 'login', [AuthController::class, 'login'] );

    Route::get('courses', [ApiController::class, 'courses']);
    Route::post('courses/enroll', [ApiController::class, 'coursesEnroll']);

    Route::get('lessons', [LessonController::class, 'lessons']);


});
