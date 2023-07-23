<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function (){
    Route::get('home', function () {
        return view('dashboards.home');
    })->name('home');;

    Route::get('/baru', function () {
        return view('dashboards.baru');
    });
});


Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/forgot', function () {
    return view('auth.forgot');
})->name('forgot');
Route::get('/reset', function () {
    return view('auth.reset');
})->name('reset');
