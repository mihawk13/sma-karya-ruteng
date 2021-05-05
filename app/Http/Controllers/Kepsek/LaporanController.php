<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Cuti;
use App\Models\Gaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function gaji()
    {
        $tahun = DB::select('SELECT DISTINCT(YEAR(tanggal)) tahun FROM gaji');
        $periode = Gaji::select('periode')->distinct()->get();
        $gaji = [];
        $thn = "";
        $prd = "";
        return view('kepsek.gaji', compact('gaji', 'periode', 'tahun', 'thn', 'prd'));
    }

    public function postGaji(Request $req)
    {
        $thn = $req->tahun;
        $prd = $req->bulan;

        $tahun = DB::select('SELECT DISTINCT(YEAR(tanggal)) tahun FROM gaji');
        $periode = Gaji::select('periode')->distinct()->get();
        $gaji = Gaji::where('periode', $prd)->whereYear('tanggal', $thn)->get();
        return view('kepsek.gaji', compact('gaji', 'periode', 'tahun', 'thn', 'prd'));
    }

    public function cuti()
    {
        $tahun = Cuti::select('tahun')->distinct()->get();
        $cuti = [];
        $thn = 0;
        return view('kepsek.cuti', compact('cuti', 'tahun', 'thn'));
    }

    public function cuti_lihat(Request $req)
    {
        $thn = $req->tahun;
        $tahun = Cuti::select('tahun')->distinct()->get();
        $cuti = Cuti::where('tahun', $thn)->get();
        return view('kepsek.cuti', compact('cuti', 'tahun', 'thn'));
    }

    public function lembur()
    {
        $tahun = Absensi::select('tahun')->distinct()->get();
        $periode = Absensi::select('periode')->distinct()->get();
        $absensi = [];
        $thn = "";
        $prd = "";
        return view('kepsek.lembur', compact('absensi', 'periode', 'tahun', 'thn', 'prd'));
    }

    public function postLembur(Request $req)
    {
        $thn = $req->tahun;
        $prd = $req->periode;

        $tahun = Absensi::select('tahun')->distinct()->get();
        $periode = Absensi::select('periode')->distinct()->get();
        $absensi = DB::select("SELECT a.*, b.nama, COUNT(a.periode) jml_lembur, SUM(a.jam_pulang)-(COUNT(a.jam_pulang)*13) jam_lembur FROM absensi a
        INNER JOIN pegawai b ON a.nip=b.nip
         WHERE a.tahun = ? AND a.periode = ? AND a.jam_pulang > '13:00' GROUP BY a.nip", [$thn, $prd]);

        return view('kepsek.lembur', compact('absensi', 'periode', 'tahun', 'thn', 'prd'));
    }

    public function keterlambatan()
    {
        $tahun = Absensi::select('tahun')->distinct()->get();
        $periode = Absensi::select('periode')->distinct()->get();
        $absensi = [];
        $thn = "";
        $prd = "";
        return view('kepsek.keterlambatan', compact('absensi', 'periode', 'tahun', 'thn', 'prd'));
    }

    public function postKeterlambatan(Request $req)
    {
        $thn = $req->tahun;
        $prd = $req->periode;

        $tahun = Absensi::select('tahun')->distinct()->get();
        $periode = Absensi::select('periode')->distinct()->get();
        $absensi = DB::select("SELECT a.*, b.nama, COUNT(a.periode) jml_terlambat, SUM(a.jam_masuk)-(COUNT(a.jam_masuk)*7) jam_terlambat FROM absensi a
        INNER JOIN pegawai b ON a.nip=b.nip
        WHERE a.tahun = ? AND a.periode = ? AND a.jam_masuk > '07:30' GROUP BY a.nip", [$thn, $prd]);

        return view('kepsek.keterlambatan', compact('absensi', 'periode', 'tahun', 'thn', 'prd'));
    }
}
