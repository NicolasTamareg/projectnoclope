<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
// use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route user
Route::post('/users',[UserController::class, 'store']) -> name('users.store');
Route::get('/users/{id}/edit',[UserController::class, 'edit']) -> name('users.edit');
Route::put('/users/{id}',[UserController::class, 'update']) -> name('users.update');



//Fin de Route user


//Route Project


//Fin Route Project

//Routes contacts
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create')->where('id', '[0-9]+');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
