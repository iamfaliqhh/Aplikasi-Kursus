<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Warranty extends Model
{
    use HasFactory;

    public $table = 'm_warranties';
    public $timestamps = false;
    public $guarded = [];
}
