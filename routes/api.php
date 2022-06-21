<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Auth
Route::post('/login', LoginController::class . '@login');
Route::post('/register', RegisterController::class . '@register');
Route::post('reset-password', ResetPasswordController::class . '@resetPassword');

// Verifications
Route::group(['prefix' => 'verify', 'as' => 'verify.'], function() {
    Route::post('phone', VerificationController::class . '@phone');
    Route::post('email', VerificationController::class . '@email');
});

// Send OTP
Route::group(['prefix' => 'otp', 'as' => 'otp.'], function() {
    Route::post('email', OtpController::class . '@email');
    Route::post('phone', OtpController::class . '@phone');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
