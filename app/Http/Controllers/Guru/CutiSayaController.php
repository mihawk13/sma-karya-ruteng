<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CutiSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nip = auth()->user()->pegawai->nip;
        $cuti = Cuti::where('nip', $nip)->get();
        return view('guru.cuti.index', compact('cuti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.cuti.tambah');
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
            $this->validate($req, [
                'file' => 'required|mimes:jpeg,png,jpg,pdf',
            ]);

            $nip = auth()->user()->pegawai->nip;
            $awal = $req->awal_cuti;
            $akhir = $req->akhir_cuti;
            $ket = $req->ket;
            $file = request()->file('file');

            $imagename = strtotime(Carbon::now()) . '.' . $file->extension();
            // utk hosting, public dihapus
            Storage::putFileAs('public/cuti', $file, $imagename);

            Cuti::create([
                'nip' => $nip,
                'periode' => Carbon::parse($awal)->format('M'),
                'tahun' => Carbon::parse($awal)->format('Y'),
                'awal_cuti' => $awal,
                'akhir_cuti' => $akhir,
                'file' => $imagename,
                'keterangan' => $ket,
            ]);

            return redirect()->route('cuti.guru')->with('berhasil', 'Data berhasil ditambah!');
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
        $ct = Cuti::find($id);
        return view('guru.cuti.ubah', compact('ct'));
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
            if (request()->file('file')) {
                $this->validate($req, [
                    'file' => 'required|mimes:jpeg,png,jpg,pdf',
                ]);
                $file = request()->file('file');

                $imagename = strtotime(Carbon::now()) . '.' . $file->extension();
                // utk hosting, public dihapus
                Storage::putFileAs('public/cuti', $file, $imagename);

                Cuti::where('id', $id)->update([
                    'file' => $imagename,
                ]);
            }

            $nip = auth()->user()->pegawai->nip;
            $awal = $req->awal_cuti;
            $akhir = $req->akhir_cuti;
            $ket = $req->ket;

            Cuti::where('id', $id)->update([
                'nip' => $nip,
                'periode' => Carbon::parse($awal)->format('M'),
                'tahun' => Carbon::parse($awal)->format('Y'),
                'awal_cuti' => $awal,
                'akhir_cuti' => $akhir,
                'keterangan' => $ket,
            ]);

            return redirect()->route('cuti.guru')->with('berhasil', 'Data berhasil diubah!');
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
