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

        $faker = Faker::create('id_ID');

        for ($i=0; $i < 5; $i++) {
            $user = User::create([
                'username' => 'gr' . $i,
                'password' => bcrypt('gr' . $i),
                'jabatan' => 'Guru',
            ]);

            Pegawai::create([
                'nama' => $faker->name,
                'jk' => 'Perempuan',
                'tgl_lahir' => '1990-02-20',
                'alamat' => $faker->address,
                'tgl_mulai' => '2021-02-20',
                'telp' => $faker->phoneNumber,
                'no_rekening' => $faker->creditCardNumber,
                'user_id' => $user->id
            ]);
        }

    }
}
