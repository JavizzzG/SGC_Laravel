<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $fillable = [
        'usuario_id',
        'curso_id',
        'estado', // 1: Pendiente, 2: Aprobado, 3: Rechazado, 4: Terminado, 5: Cancelado, 6: En curso
        'fecha_inscripcion',
    ];
}
