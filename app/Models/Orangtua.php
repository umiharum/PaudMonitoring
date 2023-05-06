<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;

    protected $fillable = [
        'parentID',
        'nama_orangtua',
        'nama_anak',
        'email_orangtua',
        'noTelp_orangtua',
        'nama_wali',
        'noTelp_wali',
    ];
}
