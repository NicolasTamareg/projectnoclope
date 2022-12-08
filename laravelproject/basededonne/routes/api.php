<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
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
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->where('id', '[0-9]+');
Route::post('/users',[UserController::class, 'store']) -> name('users.store');
Route::get('/users/{id}/edit',[UserController::class, 'edit']) -> name('users.edit');
Route::put('/users/{id}',[UserController::class, 'update']) -> name('users.update');



//Fin de Route user


//Route Project
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create')->where('id', '[0-9]+');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

//Fin Route Project

//Routes contacts
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create')->where('id', '[0-9]+');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
