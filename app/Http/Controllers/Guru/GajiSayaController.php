<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Gaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GajiSayaController extends Controller
{
    protected $pdf;

    public function __construct(\App\Models\PDF_Slip_Gaji $fpdf)
    {
        $this->pdf = $fpdf;
    }

    public function index()
    {
        $nip = auth()->user()->pegawai->nip;
        $tahun = Gaji::where('nip', $nip)->select(DB::raw('YEAR(tanggal) as tahun'))->distinct()->get();
        $periode = Gaji::where('nip', $nip)->select('periode')->distinct()->get();
        $gaji = [];
        $thn = "";
        $prd = "";

        return view('guru.gaji.index', compact('gaji','tahun', 'periode', 'thn', 'prd'));
    }

    public function pdf(Request $req)
    {
        $tahun = $req->tahun;
        $bulan = $req->bulan;
        $nama = auth()->user()->pegawai->nama;
        $jabatan = auth()->user()->pegawai->jabatan;
        $nip = auth()->user()->pegawai->nip;

        $gaji = Gaji::where('nip', $nip)->get();

        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        // $this->pdf->Cell(150);
        $this->pdf->SetMargins(70, 30, 50);

        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->ln(5);
        $this->pdf->Cell(100, 0, 'Tahun: ' . $tahun, 0, 0, 'L');
        $this->pdf->ln(5);
        $this->pdf->Cell(100, 0, 'Periode: ' . $bulan, 0, 0, 'L');

        $this->pdf->SetFont('Arial', '', 10);

        $this->pdf->ln(10);
        $this->pdf->Cell(30, 0, 'Nama', 0, 0, 'L');
        $this->pdf->Cell(0, 0, ': ' . $nama, 0, 0, 'L');
        $this->pdf->ln(5);
        $this->pdf->Cell(30, 0, 'Jabatan', 0, 0, 'L');
        $this->pdf->Cell(0, 0, ': ' . $jabatan, 0, 0, 'L');

        $this->pdf->ln(10);
        $this->pdf->Cell(30, 0, 'Gaji Pokok', 0, 0, 'L');
        $this->pdf->Cell(0, 0, ': Rp.' . number_format($gaji[0]->gaji_pokok), 0, 0, 'L');
        $this->pdf->ln(5);
        $this->pdf->Cell(30, 0, 'Bonus', 0, 0, 'L');
        $this->pdf->Cell(0, 0, ': Rp.' . number_format($gaji[0]->bonus), 0, 0, 'L');
        $this->pdf->ln(5);
        $this->pdf->Cell(30, 0, 'Tunjangan', 0, 0, 'L');
        $this->pdf->Cell(0, 0, ': Rp.' . number_format($gaji[0]->tunjangan), 0, 0, 'L');
        $this->pdf->ln(10);

        $this->pdf->Cell(30, 0, 'Gaji Kotor', 0, 0, 'L');
        $this->pdf->Cell(0, 0, ': Rp.' . number_format($gaji[0]->gaji_pokok + $gaji[0]->bonus + $gaji[0]->tunjangan), 0, 0, 'L');
        $this->pdf->ln(5);
        $this->pdf->Cell(30, 0, 'Potongan', 0, 0, 'l');
        $this->pdf->Cell(0, 0, ': Rp.' . number_format($gaji[0]->potongan), 0, 0, 'L');
        $this->pdf->ln(5);
        $this->pdf->Cell(30, 0, 'Gaji Bersih', 0, 0, 'L');
        $this->pdf->Cell(0, 0, ': Rp.' . number_format($gaji[0]->total_gaji), 0, 0, 'L');



        // $this->pdf->Cell(10, 7, 'No', 1, 0, 'C');
        // $this->pdf->Cell(45, 7, 'Nama Pegawai', 1, 0, 'C');
        // $this->pdf->Cell(25, 7, 'Gaji Pokok', 1, 0, 'C');
        // $this->pdf->Cell(25, 7, 'Tunjangan', 1, 0, 'C');
        // $this->pdf->Cell(25, 7, 'Bonus', 1, 0, 'C');
        // $this->pdf->Cell(25, 7, 'Potongan', 1, 0, 'C');
        // $this->pdf->Cell(25, 7, 'Total Gaji', 1, 1, 'C');
        // $this->pdf->ln(0);

        // $this->pdf->SetFont('Arial', '', 10);
        // $no = 1;
        // $gaji = Gaji::where('periode', $bulan)->whereYear('tanggal', $tahun)->get();
        // foreach ($gaji as $gj) {
        //     // $this->pdf->ln(10);
        //     $this->pdf->Cell(10, 7, $no++, 1, 0, 'C');
        //     $this->pdf->Cell(45, 7, $gj->pegawai->nama, 1, 0, 'C');
        //     $this->pdf->Cell(25, 7, number_format($gj->gaji_pokok), 1, 0, 'C');
        //     $this->pdf->Cell(25, 7, number_format($gj->tunjangan), 1, 0, 'C');
        //     $this->pdf->Cell(25, 7, number_format($gj->bonus), 1, 0, 'C');
        //     $this->pdf->Cell(25, 7, number_format($gj->potongan), 1, 0, 'C');
        //     $this->pdf->Cell(25, 7, number_format($gj->total_gaji), 1, 1, 'C');
        //     $this->pdf->ln(0);
        // }

        $this->pdf->Output("Slip_Gaji.pdf", "I");
    }
}
