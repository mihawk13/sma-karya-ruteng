<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Cuti;

class PDF_Cuti extends Controller
{
    protected $pdf;

    public function __construct(\App\Models\PDF_Cuti $fpdf)
    {
        $this->pdf = $fpdf;
    }

    public function pdf($tahun)
    {
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(185, 0, 'Tahun: ' . $tahun, 0, 0, 'L');

        $this->pdf->ln(10);
        $this->pdf->Cell(10, 7, 'No', 1, 0, 'C');
        $this->pdf->Cell(50, 7, 'Nama Pegawai', 1, 0, 'C');
        $this->pdf->Cell(15, 7, 'Periode', 1, 0, 'C');
        $this->pdf->Cell(35, 7, 'Tanggal Ambil Cuti', 1, 0, 'C');
        $this->pdf->Cell(35, 7, 'Tanggal Akhir Cuti', 1, 0, 'C');
        $this->pdf->Cell(40, 7, 'Keterangan', 1, 1, 'C');
        $this->pdf->ln(0);

        $this->pdf->SetFont('Arial', '', 10);
        $no = 1;
        $cuti = Cuti::where('tahun', $tahun)->get();
        foreach ($cuti as $ct) {
            // $this->pdf->ln(10);
            $this->pdf->Cell(10, 7, $no++, 1, 0, 'C');
            $this->pdf->Cell(50, 7, $ct->pegawai->nama, 1, 0, 'C');
            $this->pdf->Cell(15, 7, $ct->periode, 1, 0, 'C');
            $this->pdf->Cell(35, 7, \Carbon\Carbon::parse($ct->awal_cuti)->translatedFormat('d M Y'), 1, 0, 'C');
            $this->pdf->Cell(35, 7, \Carbon\Carbon::parse($ct->akhir_cuti)->translatedFormat('d M Y'), 1, 0, 'C');
            $this->pdf->Cell(40, 7, $ct->keterangan, 1, 1, 'C');
            $this->pdf->ln(0);
        }

        $this->pdf->Output("Cuti.pdf", "I");
    }
}
