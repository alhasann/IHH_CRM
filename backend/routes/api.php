<?php

use App\Http\Controllers\Api\HealthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group.
|
*/

// Health check endpoint
Route::get('/health', HealthController::class);

// Public routes
Route::prefix('auth')->group(function () {
    // Auth routes will be added here (login, register, etc.)
});

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Protected API routes will be added here
});
