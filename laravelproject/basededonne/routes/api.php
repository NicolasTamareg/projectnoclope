<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route Contact 
Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/{id}', [ContactController::class, 'show'])->name('contact.show');
    Route::get('/{id}', [ContactController::class, 'edit'])->name('contact.edit'); 
    Route::get('/', [ContactController::class, 'store'])->name('contact.edit');
    Route::put('/{id}', [ContactController::class, 'update'])->name('contact.update'); 
    Route::get('/create', [ContactController::class, 'create'])->name('contact.create'); 
    Route::post('/', [ContactController::class, 'save'])->name('contact.save'); 
    Route::delete('/{id}', [ContactController::class, 'delete'])->name('contact.delete');
// Route fin contact

// Route User
Route::get('/', [UsertController::class, 'index'])->name('user.index');
    Route::get('/{id}', [UsertController::class, 'show'])->name('user.show');
    Route::get('/{id}', [UsertController::class, 'edit'])->name('user.edit'); 
    Route::get('/', [UsertController::class, 'store'])->name('user.edit');
    Route::put('/{id}', [UsertController::class, 'update'])->name('user.update'); 
    Route::get('/create', [UsertController::class, 'create'])->name('user.create'); 
    Route::post('/', [UsertController::class, 'save'])->name('user.save'); 
    Route::delete('/{id}', [UsertController::class, 'delete'])->name('user.delete');
// Route Fin User

// Route Craking
Route::get('/', [CrackingController::class, 'index'])->name('cracking.index');
    Route::get('/{id}', [CrackingController::class, 'show'])->name('cracking.show');
    Route::get('/{id}', [CrackingController::class, 'edit'])->name('cracking.edit'); 
    Route::get('/', [CrackingController::class, 'store'])->name('cracking.edit');
    Route::put('/{id}', [CrackingController::class, 'update'])->name('cracking.update'); 
    Route::get('/create', [CrackingController::class, 'create'])->name('cracking.create'); 
    Route::post('/', [CrackingController::class, 'save'])->name('cracking.save'); 
    Route::delete('/{id}', [CrackingController::class, 'delete'])->name('cracking.delete');
// Route Fin Craking

// Route Project
    Route::get('/', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/{id}', [ProjectController::class, 'show'])->name('project.show');
    Route::get('/{id}', [ProjectController::class, 'edit'])->name('project.edit'); 
    Route::get('/', [ProjectController::class, 'store'])->name('project.edit');
    Route::put('/{id}', [ProjectController::class, 'update'])->name('project.update'); 
    Route::get('/create', [ProjectController::class, 'create'])->name('project.create'); 
    Route::post('/', [ProjectController::class, 'save'])->name('project.save'); 
    Route::delete('/{id}', [ProjectController::class, 'delete'])->name('project.delete');
// Route Fin Project

// Route Operation
    Route::get('/{id}', [OperationController::class, 'show'])->name('operation.show');
    Route::get('/{id}', [OperationController::class, 'edit'])->name('operation.edit'); 
    Route::get('/', [OperationController::class, 'store'])->name('operation.edit');
    Route::get('/create', [OperationController::class, 'create'])->name('operation.create'); 
// Route fin operation
   
   
 