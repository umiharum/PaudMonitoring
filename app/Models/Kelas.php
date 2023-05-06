<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelasID',
        'nama_kelas',
        'jumlah_murid',
        'jumlah_pengajar'
    ];
}
