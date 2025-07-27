<?php

use App\Http\Controllers\jurusanController;
use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('profile', profileController::class);

Route::resource('jurusan', jurusanController::class);