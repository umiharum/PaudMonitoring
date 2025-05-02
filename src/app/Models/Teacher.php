<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacherID',
        'nama_guru',
        'alamat_guru',
        'email_guru',
        'noTelp_guru',
        'kelas'
    ];
}
