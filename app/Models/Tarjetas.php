<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;

    protected $fillable = [

        'nombre',
        'apellidos',
        'dni',
        'icc',
        'telefono',
        'extension',
        'pin',
        'puk',
        'tipo_contrato',
        'servicios_adicionales',
        'fecha_recogida',
        'fecha_alta',
        'estado',
        'foto_sim',
        'foto_firma',
        'departamento',
    ];

    protected $hidden = [

        'created_at',
        'updated_at'

    ];

    protected $casts = [

        'created_at' => 'datetime: d-m-Y',
        'updated_at' => 'datetime: d-m-Y',
        'fecha_recogida' => 'datetime: d-m-Y',
        'fecha_alta' => 'datetime: d-m-Y',

    ];


}
