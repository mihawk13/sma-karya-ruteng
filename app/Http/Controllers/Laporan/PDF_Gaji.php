<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Gaji;

class PDF_Gaji extends Controller
{
    protected $pdf;

    public function __construct(\App\Models\PDF_Gaji $fpdf)
    {
        $this->pdf = $fpdf;
    }

    public function pdf($tahun, $bulan)
    {
        $this->pdf->AliasNbPages();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', 'B', 10);
        $this->pdf->Cell(100, 0, 'Tahun: ' . $tahun, 0, 0, 'L');
        $this->pdf->ln(5);
        $this->pdf->Cell(100, 0, 'Periode: ' . $bulan, 0, 0, 'L');

        $this->pdf->ln(10);
        $this->pdf->Cell(10, 7, 'No', 1, 0, 'C');
        $this->pdf->Cell(45, 7, 'Nama Pegawai', 1, 0, 'C');
        $this->pdf->Cell(25, 7, 'Gaji Pokok', 1, 0, 'C');
        $this->pdf->Cell(25, 7, 'Tunjangan', 1, 0, 'C');
        $this->pdf->Cell(25, 7, 'Bonus', 1, 0, 'C');
        $this->pdf->Cell(25, 7, 'Potongan', 1, 0, 'C');
        $this->pdf->Cell(25, 7, 'Total Gaji', 1, 1, 'C');
        $this->pdf->ln(0);

        $this->pdf->SetFont('Arial', '', 10);
        $no = 1;
        $gaji = Gaji::where('periode', $bulan)->whereYear('tanggal', $tahun)->get();
        foreach ($gaji as $gj) {
            // $this->pdf->ln(10);
            $this->pdf->Cell(10, 7, $no++, 1, 0, 'C');
            $this->pdf->Cell(45, 7, $gj->pegawai->nama, 1, 0, 'C');
            $this->pdf->Cell(25, 7, number_format($gj->gaji_pokok), 1, 0, 'C');
            $this->pdf->Cell(25, 7, number_format($gj->tunjangan), 1, 0, 'C');
            $this->pdf->Cell(25, 7, number_format($gj->bonus), 1, 0, 'C');
            $this->pdf->Cell(25, 7, number_format($gj->potongan), 1, 0, 'C');
            $this->pdf->Cell(25, 7, number_format($gj->total_gaji), 1, 1, 'C');
            $this->pdf->ln(0);
        }

        $this->pdf->Output("Gaji.pdf", "I");
    }


}
