<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelos extends Model {
    use HasFactory;

    protected $table = "modelos";
    protected $fillable = [
        'modelo',
        'descripcion', 'marca_id'
    ];
}
