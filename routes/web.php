<?php

use App\Http\Controllers\Bendahara\AbsensiController;
use App\Http\Controllers\Bendahara\CutiController;
use App\Http\Controllers\Bendahara\GajiController;
use App\Http\Controllers\Bendahara\JabatanController;
use App\Http\Controllers\Bendahara\LaporanController;
use App\Http\Controllers\Bendahara\MasaKerjaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\Bendahara\PegawaiController;
use App\Http\Controllers\Bendahara\PotonganController;
use App\Http\Controllers\Bendahara\TunjanganController;
use App\Http\Controllers\Bendahara\UserController;
use App\Http\Controllers\Guru\AbsensiSayaController;
use App\Http\Controllers\Guru\CutiSayaController;
use App\Http\Controllers\Guru\GajiSayaController;
use App\Http\Controllers\Laporan\PDF_Cuti;
use App\Http\Controllers\Laporan\PDF_Gaji;
use App\Http\Controllers\Laporan\PDF_Keterlambatan;
use App\Http\Controllers\Laporan\PDF_Lembur;

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
    } else {
        return redirect()->route('dashboard');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware(['bendahara', 'auth'])->prefix('bendahara')->group(function () {
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

    Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::get('absensi/tambah', [AbsensiController::class, 'create'])->name('absensi.tambah');
    Route::post('absensi/tambah', [AbsensiController::class, 'store']);

    Route::get('cuti', [CutiController::class, 'index'])->name('cuti');
    Route::post('cuti', [CutiController::class, 'lihat']);
    Route::get('cuti/detail/{id}', [CutiController::class, 'show'])->name('cuti.detail');

    Route::get('masa-kerja', [MasaKerjaController::class, 'index'])->name('masa_kerja');

    Route::get('gaji', [GajiController::class, 'index'])->name('gaji');
    Route::get('gaji/tambah', [GajiController::class, 'create'])->name('gaji.tambah');
    Route::post('gaji/tambah', [GajiController::class, 'store']);
    Route::get('gaji/ubah/{id}', [GajiController::class, 'show'])->name('gaji.ubah');
    Route::post('gaji/ubah/{id}', [GajiController::class, 'update']);

    Route::get('laporan-gaji', [LaporanController::class, 'gaji'])->name('lap.gaji');
    Route::post('laporan-gaji', [LaporanController::class, 'postGaji']);
    Route::get('laporan-gaji/{tahun}/{bulan}', [PDF_Gaji::class, 'pdf'])->name('lap.gaji.cetak');

    Route::get('laporan-cuti', [LaporanController::class, 'cuti'])->name('lap.cuti');
    Route::post('laporan-cuti', [LaporanController::class, 'postCuti']);
    Route::get('pdf-cuti/{tahun}', [PDF_Cuti::class, 'pdf'])->name('lap.cuti.cetak');

    Route::get('laporan-lembur', [LaporanController::class, 'lembur'])->name('lap.lembur');
    Route::post('laporan-lembur', [LaporanController::class, 'postLembur']);
    Route::get('laporan-lembur/{tahun}/{periode}', [PDF_Lembur::class, 'pdf'])->name('lap.lembur.cetak');

    Route::get('laporan-keterlambatan', [LaporanController::class, 'keterlambatan'])->name('lap.keterlambatan');
    Route::post('laporan-keterlambatan', [LaporanController::class, 'postKeterlambatan']);
    Route::get('laporan-keterlambatan/{tahun}/{periode}', [PDF_Keterlambatan::class, 'pdf'])->name('lap.terlambat.cetak');

});

Route::middleware(['guru', 'auth'])->prefix('guru')->group(function () {
    Route::get('absensi', [AbsensiSayaController::class, 'index'])->name('absensi.guru');
    Route::post('absensi', [AbsensiSayaController::class, 'lihat']);

    Route::get('cuti', [CutiSayaController::class, 'index'])->name('cuti.guru');
    Route::get('cuti/tambah', [CutiSayaController::class, 'create'])->name('cuti.guru.tambah');
    Route::post('cuti/tambah', [CutiSayaController::class, 'store']);
    Route::get('cuti/ubah/{id}', [CutiSayaController::class, 'show'])->name('cuti.guru.ubah');
    Route::post('cuti/ubah/{id}', [CutiSayaController::class, 'update']);

    Route::get('gaji', [GajiSayaController::class, 'index'])->name('gaji.guru');
    Route::post('gaji', [GajiSayaController::class, 'pdf']);


    // Route::get('gaji/tambah', [GajiSayaController::class, 'create'])->name('gaji.guru.tambah');
    Route::post('gaji/tambah', [GajiSayaController::class, 'store']);
    Route::get('gaji/ubah/{id}', [GajiSayaController::class, 'show'])->name('gaji.guru.ubah');
    Route::post('gaji/ubah/{id}', [GajiSayaController::class, 'update']);
});
