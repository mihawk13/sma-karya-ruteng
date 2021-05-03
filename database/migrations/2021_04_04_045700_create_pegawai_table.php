<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('jabatan');
            $table->string('nama');
            $table->enum('jk', ['Laki-Laki', 'Perempuan']);
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->date('tgl_mulai');
            $table->string('telp');
            $table->string('no_rekening');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
