<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::resource('request-account-deletion', 'App\Http\Controllers\RequestAccountDeletionController')->only([
    'index',
    'store'
]);
