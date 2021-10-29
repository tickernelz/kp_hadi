<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunAjaranController;
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
    Route::middleware('can:kelola tahun ajaran')->group(function () {
        Route::get('kelola-tahun_ajaran', [TahunAjaranController::class, 'index'])->name('kelola.tahun_ajaran');
        Route::get('kelola-tahun_ajaran/tambah', [TahunAjaranController::class, 'indextambah'])->name('kelola.tahun_ajaran.tambah');
        Route::post('kelola-tahun_ajaran/tambah/post', [TahunAjaranController::class, 'tambah'])->name('kelola.tahun_ajaran.tambah.post');
        Route::get('kelola-tahun_ajaran/hapus/{id}', [TahunAjaranController::class, 'hapus'])->name('kelola.tahun_ajaran.hapus');
    });
    Route::middleware('can:kelola siswa')->group(function () {
        Route::get('kelola-siswa', [SiswaController::class, 'index'])->name('kelola.siswa');
        Route::get('kelola-siswa/cari', [SiswaController::class, 'indexcari'])->name('kelola.siswa.cari');
        Route::get('kelola-siswa/tambah', [SiswaController::class, 'indextambah'])->name('kelola.siswa.tambah');
        Route::post('kelola-siswa/tambah/post', [SiswaController::class, 'tambah'])->name('kelola.siswa.tambah.post');
        Route::post('kelola-siswa/tambah/ceknis', [SiswaController::class, 'ceknistambah'])->name('kelola.siswa.tambah.ceknis');
        Route::get('kelola-siswa/edit/{id}', [SiswaController::class, 'indexedit'])->name('kelola.siswa.edit');
        Route::post('kelola-siswa/edit/{id}/post', [SiswaController::class, 'edit'])->name('kelola.siswa.edit.post');
        Route::get('kelola-siswa/hapus/{id}', [SiswaController::class, 'hapus'])->name('kelola.siswa.hapus');
        Route::post('kelola-siswa/edit/{id}/cekusername', [SiswaController::class, 'cekusernameedit'])->name('kelola.siswa.edit.cekusername');
        Route::post('kelola-siswa/edit/{id}/ceknis', [SiswaController::class, 'ceknisedit'])->name('kelola.siswa.edit.ceknis');
    });
    Route::middleware('can:kelola mata pelajaran')->group(function () {
        Route::get('kelola-mata_pelajaran', [MataPelajaranController::class, 'index'])->name('kelola.mata_pelajaran');
        Route::get('kelola-mata_pelajaran/cari', [MataPelajaranController::class, 'indexcari'])->name('kelola.mata_pelajaran.cari');
        Route::get('kelola-mata_pelajaran/tambah', [MataPelajaranController::class, 'indextambah'])->name('kelola.mata_pelajaran.tambah');
        Route::post('kelola-mata_pelajaran/tambah/post', [MataPelajaranController::class, 'tambah'])->name('kelola.mata_pelajaran.tambah.post');
        Route::get('kelola-mata_pelajaran/edit/{id}', [MataPelajaranController::class, 'indexedit'])->name('kelola.mata_pelajaran.edit');
        Route::post('kelola-mata_pelajaran/edit/{id}/post', [MataPelajaranController::class, 'edit'])->name('kelola.mata_pelajaran.edit.post');
        Route::get('kelola-mata_pelajaran/hapus/{id}', [MataPelajaranController::class, 'hapus'])->name('kelola.mata_pelajaran.hapus');
    });
});
