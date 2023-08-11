<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivo;
use App\Models\Grabadora;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class GrabadoraController extends Controller
{
    

    public function store(){

        $data = RequestFacade::validate([

            'nombre_dispositivo' => ['required','unique:dispositivos'],
            'numero_serie' => ['nullable'],
            'tipo_dispositivo' => ['required'],
            'conexion' => ['required'],
            'zona_trabajo' => ['required'],
            'modelo' => ['required'],
            'ip_principal' => ['required'],
            'observaciones' => ['nullable']

        ],
    
        [
            'nombre_dispositivo.required' => 'El nombre de dispositivo es obligatorio',
            'tipo_dispositivo.required' => 'El tipo de dispositivo es obligatorio',
            'zona_trabajo.required' => 'La zona de trabajo es obligatoria',
            'conexion.required' => 'La conexión es obligatoria',
            'modelo.required' => 'El modelo es obligatorio',
            'ip_principal.required' => 'La IP Principal es obligatoria'
        ]);

        $dispositivo = Dispositivo::create([

            'nombre_dispositivo' => $data['nombre_dispositivo'],
            'numero_serie' => $data['numero_serie'],
            'tipo_dispositivo' => $data['tipo_dispositivo'],
            'conexion' => $data['conexion'],
            'zona_trabajo' => $data['zona_trabajo']

        ]);

        $grabadora = Grabadora::create([

            'nombre_dispositivo' => $data['nombre_dispositivo'],
            'id_dispositivo' => $dispositivo->id,
            'modelo' => $data['modelo'],
            'observaciones' => $data['observaciones']

        ]);

        return redirect('/dispositivos')->with('Grabadora añadida correctamente');


    }

    public function edit($id){

        return Inertia::render('Dispositivos/Grabadoras/Edit',[

            'dispositivo' => Dispositivo::find($id),
            'grabadora' => Grabadora::where('id_dispositivo',$id)->first()

        ]);
    }

    public function update(Request $request,$id){

        $request->validate([

            'nombre_dispositivo' => ['required'],
            'numero_serie' => ['nullable'],
            'tipo_dispositivo' => ['required'],
            'zona_trabajo' => ['required'],
            'conexion' => ['required'],
            'modelo' => ['required'],
            'observaciones' => ['nullable']

        ]);

        $dispositivo = Dispositivo::where('id',$id);

        $dispositivo->update([

            'nombre_dispositivo' => $request->nombre_dispositivo,
            'numero_serie' => $request->numero_serie,
            'tipo_dispositivo' => $request->tipo_dispositivo,
            'conexion' => $request->conexion,
            'zona_trabajo' => $request->zona_trabajo

        ]);

        $grabadora = Grabadora::where('id',$id);

        $grabadora->update([

            'nombre_dispositivo' => $request->nombre_dispositivo,
            'modelo' => $request->modelo,
            'observaciones' => $request->observaciones,

        ]);

        return redirect('/dispositivos')->with('mensaje','Grabadora actualizada correctamente');

    }

    public function eliminar($id){

        Dispositivo::find($id)->delete();

        return redirect('/dispositivos')->with('mensaje','Grabadora eliminada correctamente');

    }

    public function show($id) {

        return Inertia::render('Dispositivos/Grabadoras/Show',[

            'dispositivo' => Dispositivo::find($id),
            'grabadora' => Grabadora::where('id_dispositivo',$id)->first()
        ]);


    }
}
