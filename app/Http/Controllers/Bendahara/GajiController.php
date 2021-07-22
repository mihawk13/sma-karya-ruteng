<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Cuti;
use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Potongan;
use App\Models\Tunjangan;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = Gaji::all();
        return view('bendahara.gaji.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bendahara.gaji.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        try {
            $pegawai = Pegawai::all();
            foreach ($pegawai as $pgw) {
                $periode = getBulanEng($req->periode);
                $bulan = getBulanAngka($req->periode);
                $cuti = 0;
                $gapok = 0;
                $tunjangan = 0;
                $potongan = 0;
                $bonus = 0;
                $totalGaji = 0;

                $gapok = Jabatan::where('nama_jabatan', $pgw->jabatan)->get();
                if (count($gapok) === 0) {
                    $gapok = 0;
                } else {
                    $gapok = $gapok[0]->gaji_pokok;
                }

                $like = date('Y') . '-' . $bulan;
                if ($bulan == 12) {
                    $like = date('Y') - 1 . '-' . $bulan;
                }

                $cuti = Cuti::where('nip', $pgw->nip)->where('akhir_cuti', 'LIKE', $like . '%')->get();
                if (count($cuti) === 0) {
                    $cuti = 0;
                } else {
                    $cuti = \Carbon\Carbon::parse($cuti[0]->awal_cuti)->diffInDays($cuti[0]->akhir_cuti);
                }

                $tjg = Tunjangan::where('nip', $pgw->nip)->get();
                if (count($tjg) === 0) {
                    $tunjangan = 0;
                } else {
                    $tunjangan = $tjg[0]->fungsional + $tjg[0]->jabatan + $tjg[0]->pengabdian + $tjg[0]->istri_suami + $tjg[0]->anak;
                }


                $ptg = Potongan::where('nip', $pgw->nip)->get();
                if (count($ptg) === 0) {
                    $potongan = 0;
                } else {
                    $potongan = $ptg[0]->pot_simpan_pinjam + $ptg[0]->pot_konsumsi_wajib + $ptg[0]->uang_duka;
                }

                $bonus = Absensi::where('periode', $periode)->where('nip', $pgw->nip)->where('jam_pulang', '>', '13:00')->get();
                $lembur = 0;
                if (count($bonus) === 0) {
                    $bonus = 0;
                } else {
                    foreach ($bonus as $bn) {
                        $lembur += \Carbon\Carbon::parse($bn->jam_pulang)->floatDiffInHours("13:00");
                    }
                    $bonus = $lembur * 7000;
                }

                $gaji = $gapok + $tunjangan + $bonus;
                if ($cuti > 90) {
                    $potongan += $gaji * 0.05;
                }

                $totalGaji = $gaji - $potongan;

                Gaji::create([
                    'nip' => $pgw->nip,
                    'periode' => $req->periode,
                    'tanggal' => now(),
                    'gaji_pokok' => $gapok,
                    'tunjangan' => $tunjangan,
                    'cuti' => $cuti,
                    'potongan' => $potongan,
                    'bonus' => $bonus,
                    'total_gaji' => $totalGaji,
                ]);
            }
            return redirect()->route('gaji')->with('berhasil', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('gagal', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gj = Gaji::find($id);
        return view('bendahara.gaji.ubah', compact('gj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        try {
            Gaji::where('id', $id)->update([
                'nip' => $req->nip,
                'periode' => $req->periode,
                'tanggal' => $req->tanggal,
                'gaji_pokok' => $req->gaji_pokok,
                'tunjangan' => $req->tunjangan,
                'cuti' => $req->cuti,
                'potongan' => $req->potongan,
                'bonus' => $req->bonus_lembur,
                'total_gaji' => $req->total_gaji,
            ]);

            return redirect()->route('gaji')->with('berhasil', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('gagal', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gaji::find($id)->delete();
        return redirect()->route('gaji')->with('berhasil', 'Data berhasil dihapus!');
    }
}
