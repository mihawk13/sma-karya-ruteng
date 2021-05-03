<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    public $timestamps = false;

    protected $fillable = ['nip', 'nama', 'jk', 'tgl_lahir', 'alamat', 'tgl_mulai', 'telp', 'no_rekening', 'jabatan'];
}
