<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cuti';
    public $timestamps = false;

    protected $fillable = ['nip', 'periode', 'tahun', 'awal_cuti', 'akhir_cuti', 'file', 'keterangan'];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'nip', 'nip');
    }
}
