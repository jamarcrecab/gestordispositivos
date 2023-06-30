<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;



    protected $fillable = [

        'nombre_dispositivo',
        'dominio',
        'numero_serie',
        'tipo_dispositivo',
        'conexion',
        'ip1',
        'ip2',
        'procesador',
        'so',
        'ram',
        'programa_ofimatica',
        'licencia_office',
        'licencia_windows',
        'correo_office',
        'discoduro',
        'departamento',
        'usuario_principal',
        'usuario_dominio',
        'zona_trabajo',
        'cabildo',
        'fecha_instalacion',
        'tecnico_informatico',
        'observaciones'
        
    ];

    protected $hidden = [

        'created_at',
        'updated_at'

    ];

    protected $casts = [

        'created_at' => 'datetime: d-m-Y',
        'fecha_instalacion' => 'datetime: d-m-Y',

    ];
    

}