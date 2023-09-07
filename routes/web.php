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

Route::prefix('video')->group(function () {
    Route::get('/{type}', function () {
        return view('video.index');
    });
    Route::get('/detail/{id}', function () {
        return view('video.detail');
    });
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.beranda');
    });
    Route::get('/laporan', function () {
        return view('admin.laporan');
    });


    Route::prefix('user-setting')->group(function () {
        Route::get('/', function () {
            return view('admin.user-setting.index');
        });
        Route::get('/add', function () {
            return view('admin.user-setting.add');
        });
    });

    Route::prefix('video-setting')->group(function () {
        Route::get('/', function () {
            return view('admin.video-setting.index');
        });
        Route::get('/add', function () {
            return view('admin.video-setting.add');
        });
    });

});
