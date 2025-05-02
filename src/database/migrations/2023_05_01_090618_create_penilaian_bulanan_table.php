<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_bulanan', function (Blueprint $table) {
            $table->id();
            $table->string('penilaianBulanan_id');
            $table->string('nama_murid');
            $table->string('kelompok_belajar');
            $table->string('bulan_penilaian');
            $table->string('kategori_penilaian1');
            $table->string('tingkat_penilaian1');
            $table->string('kategori_penilaian2');
            $table->string('tingkat_penilaian2');
            $table->string('kategori_penilaian3');
            $table->string('tingkat_penilaian3');
            $table->longText('catatan');
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
        Schema::dropIfExists('penilaian_bulanan');
    }
};
