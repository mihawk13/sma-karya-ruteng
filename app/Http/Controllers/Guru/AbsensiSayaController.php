<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use Carbon\Carbon;

class AbsensiSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Absensi::select('periode')->distinct()->get();
        $tahun = Absensi::select('tahun')->distinct()->get();
        $absensi = [];
        $prd = "";
        $thn = "";

        return view('guru.absensi.index', compact('absensi', 'periode', 'tahun', 'prd', 'thn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lihat(Request $req)
    {
        $periode = Absensi::select('periode')->distinct()->get();
        $tahun = Absensi::select('tahun')->distinct()->get();
        $nip = auth()->user()->pegawai->nip;
        $prd = $req->periode;
        $thn = $req->tahun;
        $absensi = Absensi::where('nip', $nip)->where('periode', $prd)->where('tahun', $thn)->get();

        return view('guru.absensi.index', compact('absensi', 'periode', 'tahun', 'prd', 'thn'));
    }
}
