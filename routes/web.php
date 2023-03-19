<?php

use http\Client\Request;
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

// Информация о пользователе
Route::get('/user/{id}', [\App\Http\Controllers\AdminController::class, 'userEdit'])->name('admin');

// Редактирование пользователя
Route::get('/user_edit/{id}', [\App\Http\Controllers\AdminController::class, 'userEditSave'])->name('user_edit');
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

// Данные успешно сохранены
Route::get('/results/good_user_edit', function () {
    return view('results/good_user_edit');
})->name('good_user_edit');

// Недостаточно прав
Route::get('/results/bad_role', function () {
    return view('results/bad_role');
})->name('bad_role');
/*-------------------------------*/


/*----------- Messanger -----------*/

// Сообщения
Route::get('/messanger', [\App\Http\Controllers\MessangerController::class, 'index'])->name('messanger');

// Чат
Route::get('/messanger/user/{user_id}', [\App\Http\Controllers\MessangerController::class, 'userCreateChat'])->name('messanger');
Route::get('/messanger/chat/{chat_id}', [\App\Http\Controllers\MessangerController::class, 'userChat'])->name('messanger');

Route::post('/api/send-message/{user_id}', [\App\Http\Controllers\MessangerController::class, 'sendMessage'])->name('messanger');

Route::get('/api/get-new-chat-messages/{user_id}', [\App\Http\Controllers\MessangerController::class, 'getNewChatMessages'])->name('messanger');

/*---------------------------------*/

Route::get('/', [\App\Http\Controllers\UserController::class, 'userPage'])->name('index');




Route::get('/test', function () {
    return 'test';
})->name('test');
