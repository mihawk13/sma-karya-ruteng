<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gaji';
    public $timestamps = false;

    protected $fillable = ['nip', 'periode', 'gaji_pokok', 'tanggal', 'bonus', 'cuti', 'potongan', 'tunjangan', 'total_gaji'];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'nip', 'nip');
    }
}
