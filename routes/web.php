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
    return view('beranda');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/laporan', function () {
    return view('laporan');
});


Route::prefix('user-setting')->group(function () {
    Route::get('/', function () {
        return view('user-setting.index');
    });
    Route::get('/add', function () {
        return view('user-setting.add');
    });
});

Route::prefix('video-setting')->group(function () {
    Route::get('/', function () {
        return view('video-setting.index');
    });
    Route::get('/add', function () {
        return view('video-setting.add');
    });
});
