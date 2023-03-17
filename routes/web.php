<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*----------- Login -----------*/
Route::get('/login', function () {
    return view('login/login');
})->name('login');

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

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
