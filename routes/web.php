<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// qr code login
Route::post('qr-code-login', [\App\Http\Controllers\QrCodeController::class, 'qrCodeLogin'])
    ->name('qr-code.login');

Route::get('qr-code-login', [\App\Http\Controllers\QrCodeController::class, 'showQrCodeLoginForm']);

// qr code generate
Route::get('qr-code', [\App\Http\Controllers\QrCodeController::class, 'showQrCode'])
    ->name('my-qr-code');

Route::get('regenerate/qr-code', [\App\Http\Controllers\QrCodeController::class, 'regenerate'])
    ->name('qr-code.regenerate');
