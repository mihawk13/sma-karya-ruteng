<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Gaji;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function gaji()
    {
        $tahun = Cuti::select('tahun')->distinct()->get();
        $gaji = Gaji::all();
        $thn = "";
        return view('bendahara.laporan.gaji', compact('gaji', 'tahun', 'thn'));
    }

    public function cuti()
    {
        $tahun = Cuti::select('tahun')->distinct()->get();
        $cuti = [];
        $thn = "";
        return view('bendahara.laporan.cuti', compact('cuti', 'tahun', 'thn'));
    }

    public function postCuti(Request $req)
    {
        $thn = $req->tahun;
        $tahun = Cuti::select('tahun')->distinct()->get();
        $cuti = Cuti::where('tahun', $thn)->get();
        return view('bendahara.laporan.cuti', compact('cuti', 'tahun', 'thn'));
    }

    public function lembur()
    {
        //
    }

    public function keterlambatan()
    {
        //
    }
}
