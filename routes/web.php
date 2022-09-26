<?php

use App\Http\Controllers\backend\CategotyController;
use App\Http\Controllers\backend\CourseController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\UserManagementController;
use App\Models\Category;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('user-role', [UserManagementController::class, 'roleIndex'])->name('user.role.index');

    Route::resource('course', CourseController::class);
    Route::resource('category', CategotyController::class);
});

require __DIR__.'/auth.php';
