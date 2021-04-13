<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    use HasFactory;

    protected $table = 'potongan';
    public $timestamps = false;

    protected $fillable = ['pegawai_id', 'pot_simpan_pinjam', 'pot_konsumsi_wajib', 'uang_duka'];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id', 'pegawai_id');
    }
}
