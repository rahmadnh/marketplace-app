<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    // Izinkan kolom-kolom ini diisi melalui Seeder atau Controller
    protected $fillable = ['name', 'code', 'symbol'];
}