<?php

namespace App\Models;

use Codedge\Fpdf\Fpdf\Fpdf;

class PDF_Cuti extends Fpdf
{
    public function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(185, 0, 'SMA KARYA RENTUNG', 0, 0, 'C');
        $this->ln(10);
        $this->Cell(185, 0, 'LAPORAN CUTI',0, 0, 'C');
        $this->ln(10);
    }

    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
