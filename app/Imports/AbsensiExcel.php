<?php

namespace App\Imports;

use App\Models\Absensi;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiExcel implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Absensi([
            'nip' => $row['nip'],
            'periode' => Carbon::parse(Date::excelToDateTimeObject($row['tanggal']))->format('M'),
            'tahun' => Carbon::parse(Date::excelToDateTimeObject($row['tanggal']))->format('Y'),
            'tanggal' => Carbon::parse(Date::excelToDateTimeObject($row['tanggal']))->format('d'),
            'jam_masuk' => $row['jam_masuk'],
            'jam_pulang' => $row['jam_pulang']
        ]);
    }
}
