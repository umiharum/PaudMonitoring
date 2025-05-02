<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class isiKelas extends Model
{
    use HasFactory;
    protected $table = 'isi_kelas';
    protected $fillable = [
        'kelas_id',
        'nama_murid'
    ];
}
