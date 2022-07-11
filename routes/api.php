<?php

use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RequestFormController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/me', UserController::class . '@index');

    Route::post('/logout', LoginController::class . '@logout');

    Route::get('packages/search', PackageController::class . '@search');
    Route::apiResources([
        'packages' => PackageController::class,
        'categories' => CategoryController::class,
        'bank-accounts' => BankAccountController::class
    ]);


    Route::prefix('settings')->group(function() {
        Route::get('/', SettingController::class . '@index');
        Route::put('/', SettingController::class . '@updateAll');
        Route::put('/{key}', SettingController::class . '@update');
    });

    Route::prefix('request-forms')->group(function() {
        Route::get('/', RequestFormController::class . '@index');
        Route::get('/all', RequestFormController::class . '@all');
        Route::post('/', RequestFormController::class . '@store');
        Route::get('/{id}', RequestFormController::class . '@show');
        Route::put('/{id}', RequestFormController::class . '@update');
        Route::delete('/{id}', RequestFormController::class . '@destroy');
        Route::post('/{id}/upload-receipt', RequestFormController::class . '@uploadPaymentReceipt');
        Route::put('/{id}/approve', RequestFormController::class . '@approve');
        Route::put('/{id}/cancel', RequestFormController::class . '@cancel');
        Route::put('/{id}/complete', RequestFormController::class . '@complete');
    });
});
