<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Izinkan kolom-kolom ini diisi
    protected $fillable = ['name', 'type', 'icon'];
}