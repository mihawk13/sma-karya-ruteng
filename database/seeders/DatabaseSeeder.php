<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::create([
            'username' => 'bendahara',
            'password' => bcrypt('bendahara'),
            'jabatan' => 'Bendahara',
        ]);

        Pegawai::create([
            'nama' => 'Bendahara',
            'jk' => 'Perempuan',
            'tgl_lahir' => '1990-02-20',
            'alamat' => 'Panjer',
            'tgl_mulai' => '2021-02-20',
            'telp' => '08123456789',
            'no_rekening' => '06548832',
            'user_id' => $user->id
        ]);
    }
}
