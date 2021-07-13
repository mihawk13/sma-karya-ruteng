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

function getBulanAngka($bln)
{
    $bulan = array_search($bln, getBulan());
    $hasil = $bulan == 0 ? 12 : $bulan;
    if (strlen($hasil) === 1) {
        $hasil = '0' . $hasil;
    }
    return $hasil;
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

function timeToKeterlambatan($jam)
{
    $hasil = substr($jam, 0, 2);
<<<<<<< HEAD

    if ($hasil == '00') {
        $hasil = substr($jam, 2, 4) . ' Menit';
    } else {
        $hasil = substr($jam, 0, 2) . ' Jam';
        $hasil = str_replace('0', '', $hasil);
    }
    return str_replace(':', '', $hasil);
=======
    return str_replace('0', '', $hasil);
>>>>>>> 02960b9224beb5f233014dac127033723f5db523
}
