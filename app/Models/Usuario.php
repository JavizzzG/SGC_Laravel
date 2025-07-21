<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'documento',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'password',
        'rol',
    ];

    protected $hidden = [
        'password',
    ];
}
