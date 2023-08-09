<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;

    protected $fillable = [

        'nombre_dispositivo',
        'numero_serie',
        'tipo_dispositivo',
        'conexion',
        'zona_trabajo'
    ];

    protected $hidden = [

        'created_at',
        'updated_at'

    ];

    protected $casts = [

        'created_at' => 'datetime: d-m-Y',

    ];

        
    

}
