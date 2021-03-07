<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    use HasFactory;
    protected $table ="marcas";
    protected $fillable = [
        'nombre','descripcion', 'user_id'
    ];
}
