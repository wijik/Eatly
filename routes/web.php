<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\PreferensiRasaController;
use App\Http\Controllers\User\RekomendasiController;


Route::get('/', function () {
    return redirect()->route('login');
});


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Auth::routes();

Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    switch ($role) {
        case 0:
            return redirect()->route('admin.dashboard');
        case 1:
            return redirect()->route('user.dashboard');
        default:
            abort(403, 'Role tidak dikenali');
    }
})->middleware('auth');

// USER - KARYAWAN
Route::middleware(['auth', 'role:1'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    Route::resource('profile', App\Http\Controllers\User\ProfileController::class)->names([
        'index' => 'user.profile',
    ]);

    Route::resource('rekomendasi', App\Http\Controllers\User\RekomendasiController::class)->names([
        'index' => 'user.rekomendasi',
    ]);
});

// ADMIN
Route::middleware(['auth', 'role:0'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('menus/hari-ini', [AdminMenuController::class, 'today'])->name('menu.today');
    Route::post('menu/set-today', [AdminMenuController::class, 'setToday'])->name('menu.set-today');

    Route::resource('users', AdminUserController::class);
    Route::resource('menus', AdminMenuController::class);
});

Route::middleware(['auth'])->post('/menu/show-detail', [RekomendasiController::class, 'showDetail'])->name('menu.showDetail');