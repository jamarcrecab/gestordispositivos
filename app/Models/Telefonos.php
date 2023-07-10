<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefonos extends Model
{
    use HasFactory;


    protected $fillable = [

        'nombre_dispositivo',
        'marca',
        'modelo',
        'usuario_principal',
        'numero_telefono',
        'departamento',
        'correo',
        

    ];

    protected $hidden = [

        'created_at',
        'updated_at'

    ];

    protected $casts = [

        'created_at' => 'datetime: d-m-Y',

    ]
}
