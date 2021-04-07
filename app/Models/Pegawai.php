<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    public $timestamps = false;

    protected $fillable = ['nama', 'jk', 'tgl_lahir', 'alamat', 'telp', 'no_rekening', 'user_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
