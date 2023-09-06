<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenador extends Model
{
    use HasFactory;


    protected $fillable = [

        'nombre_dispositivo',
        'id_dispositivo',
        'ip_principal',
        'ip_secundaria',
        'procesador',
        'discoduro',
        'so',
        'ram',
        'programa_ofimatica',
        'licencia_office',
        'licencia_windows',
        'correo_office',
        'usuario_principal',
        'usuario_dominio',
        'dominio',
        'departamento',
        'cabildo',
        'fecha_instalacion',
        'tecnico_informatico',
        'observaciones',

    ];

    protected $hidden = [

        'created_at',
        'updated_at'

    ];

    protected $casts = [

        'created_at' => 'datetime: d-m-Y',
        'updated_at' => 'datetime: d-m-Y',
        'fecha_instalacion' => 'datetime: d-m-Y'
    ];

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class,'id_dispositivo');
    }
}
