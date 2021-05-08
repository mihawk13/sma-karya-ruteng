<?php

use App\Models\Absensi;
use App\Models\Pegawai;
use App\Models\Tunjangan;
use App\Models\User;

function getJenisKelamin()
{
    $jk = ['Laki-Laki', 'Perempuan'];
    return $jk;
}

function getJabatan()
{
    $jbt = ['Bendahara', 'Kepala Sekolah', 'Guru'];
    return $jbt;
}

function getJmlPegawai()
{
    $guru = Pegawai::count();
    return $guru;
}

function getJmlUser()
{
    $user = User::count();
    return $user;
}

function getJmlAbsensi()
{
    $abs = Absensi::count();
    return $abs;
}

function getJmlTunjangan()
{
    $tjg = Tunjangan::count();
    return $tjg;
}
