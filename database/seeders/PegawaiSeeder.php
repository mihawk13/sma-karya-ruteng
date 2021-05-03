<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pgw = Pegawai::create([
            'nip' => '1234567896352',
            'nama' => 'Bendahara',
            'jk' => 'Perempuan',
            'tgl_lahir' => '1990-02-20',
            'alamat' => 'Panjer',
            'tgl_mulai' => '2021-02-20',
            'telp' => '08123456789',
            'no_rekening' => '06548832',
            'jabatan' => 'Bendahara',
        ]);

        User::create([
            'username' => 'bendahara',
            'password' => bcrypt('bendahara'),
            'pegawai_id' => $pgw->id
        ]);

        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 9; $i++) {
            $pgw = Pegawai::create([
                'nip' => $faker->isbn13,
                'jabatan' => 'Guru',
                'nama' => $faker->name,
                'jk' => 'Perempuan',
                'tgl_lahir' => '1990-02-20',
                'alamat' => $faker->address,
                'tgl_mulai' => '2021-02-20',
                'telp' => $faker->phoneNumber,
                'no_rekening' => $faker->creditCardNumber,
            ]);

            // User::create([
            //     'username' => 'gr' . $i,
            //     'password' => bcrypt('gr' . $i),
            //     'pegawai_id' => $pgw->id
            // ]);
        }
    }
}
