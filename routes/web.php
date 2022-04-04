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

Route::get('/', [\App\Http\Controllers\PetController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/pets/{id}', [\App\Http\Controllers\PetController::class, 'show']);
Route::get('/pets', [\App\Http\Controllers\PetController::class, 'index']);

Route::get('/profile/{id}', [\App\Http\Controllers\UserController::class, 'show']);
require __DIR__.'/auth.php';
