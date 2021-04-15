<?php

namespace App\Http\Livewire;

use App\Models\Pegawai;
use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public $pgw = "";
    public $jabatan = "";
    public $pegawai = [];

    public function mount()
    {
        $pgw_id = [];
        $user = ModelsUser::all();
        foreach ($user as $usr) {
            $pgw_id[] = $usr->pegawai_id;
        }
        $this->pegawai = Pegawai::whereNotIn('id', $pgw_id)->get();
    }

    public function render()
    {
        return view('livewire.user');
    }

    public function updatedPgw($pgw_id)
    {
        $jbt = Pegawai::select('jabatan')->where('id', $pgw_id)->first();
        $this->jabatan = $jbt->jabatan;
    }
}
