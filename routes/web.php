<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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
})->name('beranda');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [MainController::class, 'login'])->name('login');
Route::get('/register', function () {
    return view('register');
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('video')->group(function () {
        Route::get('/{type}', function () {
            return view('video.index');
        });
        Route::get('/{type}', [MainController::class, 'videoIndex'])->name('video.index');
        Route::get('/detail/{id}', [MainController::class, 'videoDetail'])->name('video.detail');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.beranda');
        });
        Route::get('/laporan', function () {
            return view('admin.laporan');
        });

        Route::prefix('user-setting')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user-setting.index');
            Route::get('/add', function () {
                return view('admin.user-setting.add');
            });
            Route::post('/', [UserController::class, 'store'])->name('user-setting.store');
            Route::post('/search', [UserController::class, 'search'])->name('user-setting.search');
            Route::post('/{id}', [UserController::class, 'update'])->name('user-setting.update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('user-setting.destroy');
        });

        Route::prefix('video-setting')->group(function () {
            Route::get('/', [VideoController::class, 'index'])->name('video-setting.index');
            Route::get('/add', function () {
                return view('admin.video-setting.add');
            });
            Route::post('/', [VideoController::class, 'store'])->name('video-setting.store');
            Route::post('/search', [VideoController::class, 'search'])->name('video-setting.search');
            Route::post('/{id}', [VideoController::class, 'update'])->name('video-setting.update');
            Route::delete('/{id}', [VideoController::class, 'destroy'])->name('video-setting.destroy');
        });

    });

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    Route::post('/profile', [MainController::class, 'updateProfile'])->name('profile.update');

    Route::get('/logout', function () {
        auth()->logout();
        return redirect()->route('login');
    })->name('logout');
});