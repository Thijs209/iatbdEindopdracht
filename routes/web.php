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


Route::middleware(['auth'])->group(function () {
    Route::get('logout', function (){
        auth()->logout();
        Session()->flush();
        return Redirect::to('/');
    })->name('logout');

    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'show']);
    Route::get('/profile/{id}', [\App\Http\Controllers\UserController::class, 'showto']);

    Route::get('/petprofile', [\App\Http\Controllers\PetController::class, 'create']);
    Route::get('/petprofile/{id}', [\App\Http\Controllers\PetController::class, 'edit']);
    Route::get('/petprofile/images/{id}', [\App\Http\Controllers\PetController::class, 'createImages']);
    Route::post('/petprofile/uploadimages/{id}', [\App\Http\Controllers\PetController::class, 'uploadImages']);
    Route::get('/petprofile/images/saved/{id}', [\App\Http\Controllers\PetController::class, 'created']);
    Route::post('/pets/create/{id}', [\App\Http\Controllers\PetController::class, 'store']);
    
    Route::get('/account', [\App\Http\Controllers\UserController::class, 'create']);
    Route::post('/account/create', [\App\Http\Controllers\UserController::class, 'store']);
    Route::get('/account/images/{id}', [\App\Http\Controllers\UserController::class, 'createImages']);
    Route::post('/account/uploadimages/{id}', [\App\Http\Controllers\UserController::class, 'uploadImages']);
    Route::get('/account/images/saved/{id}', [\App\Http\Controllers\UserController::class, 'created']);

    Route::post('/pets/respond/{id}', [\App\Http\Controllers\PetController::class, 'respond']);
    Route::get('/pets/show/sent/{id}', [\App\Http\Controllers\PetController::class, 'sent']);

    Route::get('/messages',[\App\Http\Controllers\MessageController::class, 'index']);
    Route::get('/messages/accept/{id}', [\App\Http\Controllers\MessageController::class, 'accept']);

    Route::get('/review/{id}', [\App\Http\Controllers\UserController::class, 'review']);
    Route::post('/review/post/{id}', [\App\Http\Controllers\UserController::class, 'storeReview']);
});

require __DIR__.'/auth.php';
