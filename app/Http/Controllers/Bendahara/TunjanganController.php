<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Tunjangan;
use Illuminate\Http\Request;

class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan = Tunjangan::all();
        return view('bendahara.tunjangan.index', compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bendahara.tunjangan.tambah');
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
            Tunjangan::create([
                'nama_jabatan' => $req->jbt,
                'fungsional' => $req->fungsional,
                'jabatan' => $req->jabatan,
                'pengabdian' => $req->pengabdian,
                'istri_suami' => $req->istri_suami,
                'anak' => $req->anak
            ]);

            return redirect()->route('tunjangan')->with('berhasil', 'Data berhasil ditambah!');
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
        $tjg = Tunjangan::find($id);
        return view('bendahara.tunjangan.ubah', compact('tjg'));
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
            Tunjangan::where('id', $id)->update([
                'nama_jabatan' => $req->jbt,
                'fungsional' => $req->fungsional,
                'jabatan' => $req->jabatan,
                'pengabdian' => $req->pengabdian,
                'istri_suami' => $req->istri_suami,
                'anak' => $req->anak
            ]);

            return redirect()->route('tunjangan')->with('berhasil', 'Data berhasil diubah!');
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
