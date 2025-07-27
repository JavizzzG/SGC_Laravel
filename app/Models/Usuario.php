<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

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
