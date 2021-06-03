<?php

namespace App\Http\Livewire;

use App\Models\Gaji as GajiModels;
use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Potongan;
use App\Models\Tunjangan;
use Livewire\Component;

class Gaji extends Component
{
    public $tanggal = '';
    public $periode = '';
    public $nip = '';
    public $jabatan = '';
    public $gapok = 0;
    public $tunjangan = 0;
    public $potongan = 0;
    public $bonus = 0;
    public $totalGaji = 0;

    public function mount($gj_id)
    {
        if ($gj_id != 0) {
            $gj = GajiModels::find($gj_id);
            $this->gapok = $gj->gaji_pokok;
            $this->tunjangan = $gj->tunjangan;
            $this->potongan = $gj->potongan;
            $this->bonus = $gj->bonus;
            $this->totalGaji = $gj->total_gaji;
            $this->nip = $gj->nip;
            $this->periode = $gj->periode;
            $this->tanggal = $gj->tanggal;
        }else{
            $this->tanggal = now();
        }
    }

    public function render()
    {
        $pegawai = Pegawai::all();
        return view('livewire.gaji', compact('pegawai'));
    }

    public function UpdatedPeriode($val)
    {
        $this->periode = getBulanEng($val);
        try {
            $bonus = Absensi::where('periode', $this->periode)->where('nip', $this->nip)->where('jam_pulang', '>', '13:00')->get();
            $lembur = 0;
            if (count($bonus) === 0) {
                $this->bonus = 0;
            } else {
                foreach ($bonus as $bn) {
                    $lembur += \Carbon\Carbon::parse($bn->jam_pulang)->floatDiffInHours("13:00");
                }
                $this->bonus = $lembur * 7000;
            }
            $this->totalGaji = ($this->gapok + $this->tunjangan + $this->bonus) - $this->potongan;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function UpdatedNip($nip)
    {
        $this->nip = $nip;
        try {
            $pegawai = Pegawai::where('nip', $nip)->get();
            $jabatan = $pegawai[0]->jabatan;


            $gapok = Jabatan::where('nama_jabatan', $jabatan)->get();
            if (count($gapok) === 0) {
                $this->gapok = 0;
            } else {
                $this->gapok = $gapok[0]->gaji_pokok;
            }


            $tjg = Tunjangan::where('nip', $nip)->get();
            if (count($tjg) === 0) {
                $this->tunjangan = 0;
            } else {
                $this->tunjangan = $tjg[0]->fungsional + $tjg[0]->jabatan + $tjg[0]->pengabdian + $tjg[0]->istri_suami + $tjg[0]->anak;
            }


            $ptg = Potongan::where('nip', $nip)->get();
            if (count($ptg) === 0) {
                $this->potongan = 0;
            } else {
                $this->potongan = $ptg[0]->pot_simpan_pinjam + $ptg[0]->pot_konsumsi_wajib + $ptg[0]->uang_duka;
            }

            $bonus = Absensi::where('periode', $this->periode)->where('nip', $nip)->where('jam_pulang', '>', '13:00')->get();
            $lembur = 0;
            if (count($bonus) === 0) {
                $this->bonus = 0;
            } else {
                foreach ($bonus as $bn) {
                    $lembur += \Carbon\Carbon::parse($bn->jam_pulang)->floatDiffInHours("13:00");
                }
                $this->bonus = $lembur * 7000;
            }


            $this->totalGaji = ($this->gapok + $this->tunjangan + $this->bonus) - $this->potongan;
        } catch (\Throwable $th) {
            //throw $th;
            $this->gapok = 0;
            $this->tunjangan = 0;
            $this->potongan = 0;
            $this->bonus = 0;
            $this->totalGaji = 0;
        }
    }
}
