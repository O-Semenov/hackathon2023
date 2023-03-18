<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*----------- Login -----------*/
Route::get('/login', function () {
    return view('login/login');
})->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

Route::get('/login-error', function () {
    return view('login/login-error');
})->name('login-error');

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('login'));
})->name('logout');
/*-----------------------------*/

Route::get('/', function () {
    if (!Auth::check()){
        return redirect(route('login'));
    }
    return view('index');
})->name('index');




Route::get('/test', function () {
    return 'test';
})->name('test');
