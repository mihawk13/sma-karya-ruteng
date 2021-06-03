<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunjangan extends Model
{
    use HasFactory;

    protected $table = 'tunjangan';
    public $timestamps = false;

    protected $fillable = ['nip', 'fungsional', 'jabatan', 'pengabdian', 'istri_suami', 'anak'];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'nip', 'nip');
    }
}
