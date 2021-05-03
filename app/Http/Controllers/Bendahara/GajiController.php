<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Gaji;
use App\Models\Pegawai;
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
            Gaji::create([
                'nip' => $req->nip,
                'periode' => $req->periode,
                'tanggal' => $req->tanggal,
                'gaji_pokok' => $req->gaji_pokok,
                'tunjangan' => $req->tunjangan,
                'potongan' => $req->potongan,
                'bonus' => $req->bonus_lembur,
                'total_gaji' => $req->total_gaji,
            ]);

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
        $pgw = Gaji::find($id);
        return view('bendahara.gaji.ubah', compact('pgw'));
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
                'jabatan' => $req->jabatan,
                'nama' => $req->nama,
                'jk' => $req->jk,
                'tgl_lahir' => $req->tgl,
                'alamat' => $req->alamat,
                'tgl_mulai' => $req->tglMulai,
                'telp' => $req->telp,
                'no_rekening' => $req->rekening
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
        //
    }
}
