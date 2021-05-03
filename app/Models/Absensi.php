<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';
    public $timestamps = false;

    protected $fillable = ['nip', 'periode', 'tahun', 'tanggal', 'jam_masuk', 'jam_pulang'];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'nip', 'nip');
    }
}
