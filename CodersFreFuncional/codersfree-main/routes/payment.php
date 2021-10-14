<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('{course}/checkout', [PaymentController::class, 'checkout'])->name('checkout');

Route::get('{course}/pay', [PaymentController::class, 'pay'])->name('pay');

Route::get('approved/{courseId}/{details}', [PaymentController::class, 'approved'])->name('approved');

Route::get('failed/{courseId}/{data}', [PaymentController::class, 'failed'])->name('failed');

/* Route::post('otherapproved/{data}', [PaymentController::class, 'otherapproved'])->name('otherapproved'); */
/* Route::post('otherapproved/{data}', function ($data) {
  return $data;
})->name('otherapproved'); */
