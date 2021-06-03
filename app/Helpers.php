<?php

use App\Models\Gaji;
use App\Models\Absensi;
use App\Models\Cuti;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Potongan;
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

function getBulan()
{
    return ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
}

function getBulanEng($bln)
{
    $bulan = array_search($bln, getBulan());
    $bulanEn = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    return $bulanEn[$bulan];
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

function getJmlPotongan()
{
    $ptg = Potongan::count();
    return $ptg;
}

function getJmlJabatan()
{
    $jbt = Jabatan::count();
    return $jbt;
}

function getJmlCuti()
{
    $ct = Cuti::count();
    return $ct;
}

function getJmlGaji()
{
    $gj = Gaji::count();
    return $gj;
}

function getJmlAbsensiSaya()
{
    $nip = auth()->user()->pegawai->nip;
    $abs = Absensi::where('nip', $nip)->count();
    return $abs;
}

function getJmlCutiSaya()
{
    $nip = auth()->user()->pegawai->nip;
    $ct = Cuti::where('nip', $nip)->count();
    return $ct;
}

function getJmlGajiSaya()
{
    $nip = auth()->user()->pegawai->nip;
    $gj = Gaji::where('nip', $nip)->count();
    return $gj;
}
