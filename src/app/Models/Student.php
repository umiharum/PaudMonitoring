<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentID',
        'nama_murid',
        'kelompok_belajar',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'nama_orangtua',
        'nama_orangtua'
    ];
}
