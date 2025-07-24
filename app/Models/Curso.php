<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_limite_inscripcion',
        'fecha_inicio',
        'fecha_fin',
        'cupo_maximo',
        'activo'
    ];
}
