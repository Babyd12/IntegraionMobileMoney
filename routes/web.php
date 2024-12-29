<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/paiement', [ProductController::class, 'store'])->name('paiement');
Route::get('/success', [ProductController::class, 'success'])->name('success');
Route::get('/cancel', [ProductController::class, 'cancel'])->name('cancel');
