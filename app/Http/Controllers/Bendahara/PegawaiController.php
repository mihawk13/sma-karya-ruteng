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
            $user = User::create([
                'username' => $req->user,
                'password' => bcrypt($req->pass),
                'jabatan' => $req->jabatan,
            ]);

            Pegawai::create([
                'nama' => $req->nama,
                'jk' => $req->jk,
                'tgl_lahir' => $req->tgl,
                'alamat' => $req->alamat,
                'tgl_mulai' => $req->tglMulai,
                'telp' => $req->telp,
                'no_rekening' => $req->rekening,
                'user_id' => $user->id
            ]);

            return redirect()->route('pegawai')->with('berhasil', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('gagal', 'Username sudah digunakan!, gunakan username yang lain');
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

            if (isset($req->pass)) {
                User::where('id', $id)->update([
                    'password' => bcrypt($req->pass)
                ]);
            }

            User::where('id', $id)->update([
                'jabatan' => $req->jabatan
            ]);

            Pegawai::where('id', $id)->update([
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
