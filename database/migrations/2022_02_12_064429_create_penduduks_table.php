<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tgl_lapor');
            $table->bigInteger('nik')->unique();
            $table->string('nokk')->unique();
            $table->string('nama');
            $table->string('statuskeluarga');
            $table->string('jk');
            $table->string('agama');
            $table->string('statuspenduduk');
            $table->string('maksud_tujuan_kedatangan')->nullable();
            $table->string('nomorakta');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->time('waktulahir');
            $table->string('tempatdilahirkan');
            $table->string('kelahiran_anak_ke');
            $table->string('penolong_kelahiran');
            $table->float('beratLahir');
            $table->integer('panjangLahir');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
            $table->string('negara_asal');
            $table->string('nikAyah');
            $table->string('nikIbu');
            $table->string('namaAyah');
            $table->string('namaIbu');
            $table->string('dusun',40);
            $table->string('rw');
            $table->string('rt');
            $table->string('email');
            $table->text('alamat_sekarang');
            $table->string('statuskawin')->nullable();
            $table->string('noaktanikah')->nullable();
            $table->date('tanggalperkawinan')->nullable();
            $table->string('akta_perceraian')->nullable();
            $table->date('tanggalperceraian')->nullable();
            $table->integer('goldarah')->nullable();
            $table->string('cacat')->nullable();
            $table->string('sakitmenahun')->nullable();
            $table->string('akseptorKB')->nullable();
            $table->string('asuransi')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduks');
    }
}
