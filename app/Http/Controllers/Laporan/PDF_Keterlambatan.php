<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDF_Keterlambatan extends Controller
{
    protected $pdf;

    public function __construct(\App\Models\PDF_Keterlambatan $fpdf)
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
        $this->pdf->Cell(20, 7, 'Periode', 1, 0, 'C');
        $this->pdf->Cell(20, 7, 'Tahun', 1, 0, 'C');
        $this->pdf->Cell(45, 7, 'Keterlambatan / Jam', 1, 0, 'C');
        $this->pdf->Cell(45, 7, 'Jumlah Keterlambatan', 1, 0, 'C');
        $this->pdf->ln(0);

        $this->pdf->SetFont('Arial', '', 10);
        $no = 1;
        $absensi = DB::select("SELECT a.*, b.nama, COUNT(a.periode) jml_terlambat, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(a.jam_masuk, '07:30')))) jam_terlambat FROM absensi a
        INNER JOIN pegawai b ON a.nip=b.nip
        WHERE a.tahun = ? AND a.periode = ? AND a.jam_masuk > '07:30' GROUP BY a.nip", [$tahun, $bulan]);
        foreach ($absensi as $abs) {
            $this->pdf->ln(7);
            $this->pdf->Cell(10, 7, $no++, 1, 0, 'C');
            $this->pdf->Cell(45, 7, $abs->nama, 1, 0, 'C');
            $this->pdf->Cell(20, 7, $abs->periode, 1, 0, 'C');
            $this->pdf->Cell(20, 7, $abs->tahun, 1, 0, 'C');
            $this->pdf->Cell(45, 7, timeToKeterlambatan($abs->jam_terlambat), 1, 0, 'C');
            $this->pdf->Cell(45, 7, $abs->jml_terlambat, 1, 0, 'C');
            $this->pdf->ln(0);
        }

        $this->pdf->Output("Lembur.pdf", "I");
    }
}
