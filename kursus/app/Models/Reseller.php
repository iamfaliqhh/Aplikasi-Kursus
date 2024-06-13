<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    use HasFactory;

    public $table = 'official_reseller';
    public $timestamps = false;
    public $guarded = [];
}
