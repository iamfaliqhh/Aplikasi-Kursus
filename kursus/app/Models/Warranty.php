<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    public $table = 'warranty';
    public $guarded = [];
    use HasFactory;

    public function tipe_mobil()
    {
        return $this->belongsTo(Tipe::class,'tipe','id');
    }
}
