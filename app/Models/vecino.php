<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vecino extends Model
{
    use HasFactory;

    protected $table = 'vecinos';

    protected $fillable = [
        'nombre',
        'escalera',
        'piso',
        'puerta',
    ];
}