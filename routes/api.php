<?php
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::middleware('api')->group(function () {
    Route::get('/users', [\App\Http\Controllers\API\UserController::class, 'index']);
});
