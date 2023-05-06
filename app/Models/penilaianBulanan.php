<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaianBulanan extends Model
{
    use HasFactory;

    protected $table = 'penilaian_Bulanan';

    protected $fillable = [
        'penilaianBulanan_id',
        'nama_murid',
        'kelompok_belajar',
        'bulan_penilaian',
        'kategori_penilaian1',
        'tingkat_penilaian1',
        'kategori_penilaian2',
        'tingkat_penilaian2',
        'kategori_penilaian3',
        'tingkat_penilaian3',
    ];
}
