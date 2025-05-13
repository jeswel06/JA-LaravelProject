<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobAppointmentController;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

// Protected routes (require login)
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // User CRUD
    Route::get('/get-users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::post('/add-users', [UserController::class, 'store']);
    Route::put('/edit-users/{id}', [UserController::class, 'update']);
    Route::delete('/delete-users/{id}', [UserController::class, 'destroy']);

    // Job Appointment CRUD
    Route::get('/get-appointments', [JobAppointmentController::class, 'index']);
    Route::get('/appointments/{id}', [JobAppointmentController::class, 'show']);
    Route::post('/add-appointments', [JobAppointmentController::class, 'store']);
    Route::put('/edit-appointments/{id}', [JobAppointmentController::class, 'update']);
    Route::delete('/delete-appointments/{id}', [JobAppointmentController::class, 'destroy']);

    // Job CRUD
    Route::get('/jobs', [JobController::class, 'index']);
    Route::get('/jobs/{id}', [JobController::class, 'show']);
    Route::post('/add-jobs', [JobController::class, 'store']);
    Route::put('/edit-jobs/{id}', [JobController::class, 'update']);
    Route::delete('/delete-jobs/{id}', [JobController::class, 'destroy']);

    // Logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
