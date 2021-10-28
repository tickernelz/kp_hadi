<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::middleware('loggedin')->group(function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'registerView'])->name('register-view');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [HomeController::class, 'index'])->name('beranda');
    Route::middleware('can:kelola user')->group(function () {
        Route::get('kelola-user', [UserController::class, 'index'])->name('kelola.user');
        Route::get('kelola-user/tambah', [UserController::class, 'indextambah'])->name('kelola.user.tambah');
        Route::post('kelola-user/tambah/post', [UserController::class, 'tambah'])->name('kelola.user.tambah.post');
        Route::get('kelola-user/edit/{id}', [UserController::class, 'indexedit'])->name('kelola.user.edit');
        Route::post('kelola-user/edit/{id}/post', [UserController::class, 'edit'])->name('kelola.user.edit.post');
        Route::get('kelola-user/hapus/{id}', [UserController::class, 'hapus'])->name('kelola.user.hapus');
        Route::post('kelola-user/cekusername', [UserController::class, 'cekusername'])->name('kelola.user.tambah.cekusername');
        Route::post('kelola-user/edit/{id}/cekusername', [UserController::class, 'cekusernameedit'])->name('kelola.user.edit.cekusername');
    });
    Route::middleware('can:kelola kelas')->group(function () {
        Route::get('kelola-kelas', [KelasController::class, 'index'])->name('kelola.kelas');
        Route::get('kelola-kelas/tambah', [KelasController::class, 'indextambah'])->name('kelola.kelas.tambah');
        Route::post('kelola-kelas/tambah/post', [KelasController::class, 'tambah'])->name('kelola.kelas.tambah.post');
        Route::get('kelola-kelas/edit/{id}', [KelasController::class, 'indexedit'])->name('kelola.kelas.edit');
        Route::post('kelola-kelas/edit/{id}/post', [KelasController::class, 'edit'])->name('kelola.kelas.edit.post');
        Route::get('kelola-kelas/hapus/{id}', [KelasController::class, 'hapus'])->name('kelola.kelas.hapus');
        Route::post('kelola-kelas/cek', [KelasController::class, 'cektambah'])->name('kelola.kelas.tambah.cek');
        Route::post('kelola-kelas/edit/{id}/cek', [KelasController::class, 'cekedit'])->name('kelola.kelas.edit.cek');
    });
});
