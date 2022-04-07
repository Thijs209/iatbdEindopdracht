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

Route::get('/pets/show/{id}', [\App\Http\Controllers\PetController::class, 'show']);
Route::get('/pets/{Animal}',  [\App\Http\Controllers\PetController::class, 'index']);
Route::get('/pets', [\App\Http\Controllers\PetController::class, 'index']);

Route::get('/profile/{id}', [\App\Http\Controllers\UserController::class, 'show']);

Route::middleware(['auth'])->group(function () {
    Route::get('/petprofile', [\App\Http\Controllers\PetController::class, 'create']);
    Route::post('/petprofile/uploadimages/{id}', [\App\Http\Controllers\PetController::class, 'uploadImages']);
    Route::get('/petprofile/images/{id}', [\App\Http\Controllers\PetController::class, 'createImages']);
    Route::get('/petprofile/images/{id}/upload', [\App\Http\Controllers\PetController::class, 'uploadImages']);
    Route::post('/pets', [\App\Http\Controllers\PetController::class, 'store']);
    
    Route::get('/account', [\App\Http\Controllers\UserController::class, 'create']);
    Route::post('/account/uploadimages', [\App\Http\Controllers\UserController::class, 'upload']);
});

require __DIR__.'/auth.php';
