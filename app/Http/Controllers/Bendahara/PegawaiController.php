<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('bendahara.pegawai.index', compact('pegawai'));
    }


    public function create()
    {
        return view('bendahara.pegawai.tambah');
    }


    public function store(Request $req)
    {
        try {
            Pegawai::create([
                'nip' => $req->nip,
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

    public function show($id)
    {
        $pgw = Pegawai::find($id);
        return view('bendahara.pegawai.ubah', compact('pgw'));
    }

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
}
