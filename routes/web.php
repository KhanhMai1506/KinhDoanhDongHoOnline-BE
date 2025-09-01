<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/momo_return', [PaymentController::class, 'momo_return']);
Route::post('/momo_ipn', [PaymentController::class, 'momo_ipn']);

Route::get('/', function () {
    return view('welcome');
});
