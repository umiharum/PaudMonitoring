<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $fillable = [
        'penilaianHarian_id',
        'nama_murid',
        'tanggal_penilaian',
        'kategori_penilaian',
        'keterangan_penilaian',
        'tingkat_penilaian',
        'foto'
    ];

    public function getRouteKeyName()
    {
        return 'studentID';
    }
}
