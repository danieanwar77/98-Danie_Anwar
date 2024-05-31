<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('home', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/logout', function()
{
    Auth::logout();
	return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{id}', [App\Http\Controllers\HomeController::class, 'show']);
Route::post('/home/store', [App\Http\Controllers\HomeController::class, 'store']);
Route::put('/home/{id}', [App\Http\Controllers\HomeController::class, 'update']);
Route::delete('/home/{id}', [App\Http\Controllers\HomeController::class, 'destroy']);
