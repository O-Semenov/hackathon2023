<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*----------- Login -----------*/
Route::get('/login', function () {
    if (Auth::check()){
        return redirect(route('index'));
    }
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

/*----------- Admin -----------*/
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'adminPage'])->name('admin');
Route::post('/register', [\App\Http\Controllers\LoginController::class, 'register'])->name('register');
/*-----------------------------*/

/*----------- Results -----------*/
// Успешная регистрация
Route::get('/results/good_registration', function () {
    return view('results/good_registration');
})->name('good_registration');

// Пользователь с таким email существует
Route::get('/results/registration_has_user', function () {
    return view('results/registration_has_user');
})->name('registration_has_user');

// Нет такого отдела
Route::get('/results/registration_bad_department', function () {
    return view('results/registration_bad_department');
})->name('registration_bad_department');
/*-------------------------------*/

Route::get('/', [\App\Http\Controllers\UserController::class, 'userPage'])->name('index');




Route::get('/test', function () {
    return 'test';
})->name('test');
