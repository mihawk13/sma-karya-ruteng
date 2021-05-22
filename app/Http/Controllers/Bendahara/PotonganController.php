<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Potongan;
use Illuminate\Http\Request;

class PotonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $potongan = Potongan::all();
        return view('bendahara.potongan.index', compact('potongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $potongan = Potongan::get('nip');
        $pegawai = Pegawai::whereNotIn('nip', $potongan)->get();
        return view('bendahara.potongan.tambah', compact('pegawai'));
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
            Potongan::create([
                'nip' => $req->nip,
                'pot_simpan_pinjam' => $req->simpan_pinjam,
                'pot_konsumsi_wajib' => $req->konsumsi_wajib,
                'uang_duka' => $req->uang_duka
            ]);

            return redirect()->route('potongan')->with('berhasil', 'Data berhasil ditambah!');
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
        $ptg = Potongan::find($id);
        $pegawai = Pegawai::all();
        return view('bendahara.potongan.ubah', compact('ptg', 'pegawai'));
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
            Potongan::where('id', $id)->update([
                'nip' => $req->nip,
                'pot_simpan_pinjam' => $req->simpan_pinjam,
                'pot_konsumsi_wajib' => $req->konsumsi_wajib,
                'uang_duka' => $req->uang_duka
            ]);

            return redirect()->route('potongan')->with('berhasil', 'Data berhasil diubah!');
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
