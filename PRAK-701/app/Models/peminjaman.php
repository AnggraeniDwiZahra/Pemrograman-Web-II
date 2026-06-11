<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $table = 'peminjaman'; 
    protected $guarded = [];
    public $timestamps = false; 
}