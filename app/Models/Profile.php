<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama',
        'nim',
        'prodi',
        'hobi',
        'skill',
        'gambar'
    ];
}