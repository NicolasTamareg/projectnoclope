<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/clients/create', function () {
   
});


// Routes stripe
Route::get('/clients', [PaymentController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [PaymentController::class, 'create'])->name('clients.create')->where('id', '[0-9]+');
// Route::post('/clients', [PaymentController::class, 'store'])->name('clients.store');
// Route::get('/clients/{id}', [PaymentController::class, 'show'])->name('clients.show');
// Route::get('/clients/{id}/edit', [PaymentController::class, 'edit'])->name('clients.edit')->where('id', '[0-9]+');
// Route::put('/clients/{id}', [PaymentController::class, 'update'])->name('clients.update')->where('id', '[0-9]+');
// Route::delete('/clients/{id}', [PaymentController::class, 'destroy'])->name('clients.destroy');