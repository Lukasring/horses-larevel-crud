<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome', ['horses' => \App\Models\Horse::orderBy('name')->get()]);
})->name('index');

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource('horses', App\Http\Controllers\HorseController::class);
    Route::resource('betters', App\Http\Controllers\BetterController::class);
});
