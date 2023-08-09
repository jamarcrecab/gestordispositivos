<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
    use HasFactory;


    protected $fillable = [

        'nombre_dispositivo',
        'id_dispositivo',
        'ip_principal',
        'ip_secundaria',
        'marca',
        'modelo',
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

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class,'id_dispositivo');
    }
}
