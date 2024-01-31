<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WindowFilms extends Model
{
    use HasFactory;

    protected $table = "window-film";
    protected $primaryKey= "id";
    protected $fillable= "nama";
    public $timestamps = false;
    public $incrementing = false;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
