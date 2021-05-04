<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = Cuti::select('tahun')->distinct()->get();
        $cuti = [];//Cuti::all();
        $thn = 0;
        return view('bendahara.cuti.index', compact('cuti', 'tahun', 'thn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lihat(Request $req)
    {
        $thn = $req->tahun;
        $tahun = Cuti::select('tahun')->distinct()->get();
        $cuti = Cuti::where('tahun', $thn)->get();
        return view('bendahara.cuti.index', compact('cuti', 'tahun', 'thn'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ct = Cuti::find($id);
        return view('bendahara.cuti.detail', compact('ct'));
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
