<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('bendahara.pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bendahara.pegawai.tambah');
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
            Pegawai::create([
                'jabatan' => $req->jabatan,
                'nama' => $req->nama,
                'jk' => $req->jk,
                'tgl_lahir' => $req->tgl,
                'alamat' => $req->alamat,
                'tgl_mulai' => $req->tglMulai,
                'telp' => $req->telp,
                'no_rekening' => $req->rekening,
            ]);

            return redirect()->route('pegawai')->with('berhasil', 'Data berhasil ditambah!');
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
        $pgw = Pegawai::find($id);
        return view('bendahara.pegawai.ubah', compact('pgw'));
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
            Pegawai::where('id', $id)->update([
                'jabatan' => $req->jabatan,
                'nama' => $req->nama,
                'jk' => $req->jk,
                'tgl_lahir' => $req->tgl,
                'alamat' => $req->alamat,
                'tgl_mulai' => $req->tglMulai,
                'telp' => $req->telp,
                'no_rekening' => $req->rekening
            ]);

            return redirect()->route('pegawai')->with('berhasil', 'Data berhasil diubah!');
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
