<?php

use App\Http\Controllers\Bendahara\JabatanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\Bendahara\PegawaiController;
use App\Http\Controllers\Bendahara\PotonganController;
use App\Http\Controllers\Bendahara\TunjanganController;
use App\Http\Controllers\Bendahara\UserController;

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

Route::get('/', function () {
    if (Auth::guest()) {
        return view('auth.login');
    }else{
        return redirect()->route('dashboard');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('pegawai/tambah', [PegawaiController::class, 'create'])->name('pegawai.tambah');
Route::post('pegawai/tambah', [PegawaiController::class, 'store']);
Route::get('pegawai/ubah/{id}', [PegawaiController::class, 'show'])->name('pegawai.ubah');
Route::post('pegawai/ubah/{id}', [PegawaiController::class, 'update']);

Route::get('user', [UserController::class, 'index'])->name('user');
Route::get('user/tambah', [UserController::class, 'create'])->name('user.tambah');
Route::post('user/tambah', [UserController::class, 'store']);
Route::get('user/ubah/{id}', [UserController::class, 'show'])->name('user.ubah');
Route::post('user/ubah/{id}', [UserController::class, 'update']);

Route::get('jabatan', [JabatanController::class, 'index'])->name('jabatan');
Route::get('jabatan/tambah', [JabatanController::class, 'create'])->name('jabatan.tambah');
Route::post('jabatan/tambah', [JabatanController::class, 'store']);
Route::get('jabatan/ubah/{id}', [JabatanController::class, 'show'])->name('jabatan.ubah');
Route::post('jabatan/ubah/{id}', [JabatanController::class, 'update']);

Route::get('tunjangan', [TunjanganController::class, 'index'])->name('tunjangan');
Route::get('tunjangan/tambah', [TunjanganController::class, 'create'])->name('tunjangan.tambah');
Route::post('tunjangan/tambah', [TunjanganController::class, 'store']);
Route::get('tunjangan/ubah/{id}', [TunjanganController::class, 'show'])->name('tunjangan.ubah');
Route::post('tunjangan/ubah/{id}', [TunjanganController::class, 'update']);

Route::get('potongan', [PotonganController::class, 'index'])->name('potongan');
Route::get('potongan/tambah', [PotonganController::class, 'create'])->name('potongan.tambah');
Route::post('potongan/tambah', [PotonganController::class, 'store']);
Route::get('potongan/ubah/{id}', [PotonganController::class, 'show'])->name('potongan.ubah');
Route::post('potongan/ubah/{id}', [PotonganController::class, 'update']);
