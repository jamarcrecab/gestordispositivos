<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
    use HasFactory;


    protected $fillable = [

        'nombre_dispositivo',
        'ip_principal',
        'ip_secundaria',
        'cabildo',
        'observaciones'

    ];

    protected $hidden = [

        'created_at',
        'updated_at'

    ];

    protected $casts = [

        'created_at' => 'datetime: d-m-Y',
    ];
}
