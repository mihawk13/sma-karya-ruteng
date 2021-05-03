<?php

namespace App\Http\Livewire;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Potongan;
use App\Models\Tunjangan;
use Livewire\Component;

class Gaji extends Component
{
    public $nip = '';
    public $jabatan = '';
    public $gapok = '';
    public $tunjangan = '';
    public $potongan = '';
    public $bonus = '';
    public $totalGaji = '';

    public function render()
    {
        $pegawai = Pegawai::all();
        return view('livewire.gaji', compact('pegawai'));
    }

    public function UpdatedNip($nip)
    {
        try {
            $pegawai = Pegawai::where('nip', $nip)->get();
            $jabatan = $pegawai[0]->jabatan;

            $gapok = Jabatan::where('nama_jabatan', $jabatan)->get();
            $this->gapok = $gapok[0]->gaji_pokok;

            $tjg = Tunjangan::where('nama_jabatan', $jabatan)->get();
            $this->tunjangan = $tjg[0]->fungsional + $tjg[0]->jabatan + $tjg[0]->pengabdian + $tjg[0]->istri_suami + $tjg[0]->anak;

            $ptg = Potongan::where('nip', $nip)->get();
            $this->potongan = $ptg[0]->pot_simpan_pinjam + $ptg[0]->pot_konsumsi_wajib + $ptg[0]->uang_duka;

            $this->totalGaji = ($this->gapok + $this->tunjangan) - $this->potongan;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function UpdatedBonus($bonus)
    {
        try {
            $this->bonus = $bonus;

            $this->totalGaji = ($this->gapok + $this->tunjangan + $this->bonus) - $this->potongan;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
