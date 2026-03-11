<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReceiptController;


Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/print-struk', [ReceiptController::class, 'print']);
