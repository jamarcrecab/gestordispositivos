<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivo;
use App\Models\Impresora;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class ImpresoraController extends Controller
{
    
    public function store(){

        $data = RequestFacade::validate([

            'nombre_dispositivo' => ['required','unique:dispositivos'],
            'numero_serie' => ['nullable'],
            'tipo_dispositivo' => ['required'],
            'zona_trabajo' => ['required'],
            'conexion' => ['required'],
            'marca' => ['required'],
            'modelo' => ['required'],
            'ip_principal'=> ['required'],
            'ip_secundaria' => ['nullable'],
            'cabildo' => ['required'],
            'observaciones' => ['nullable']
        ],

        [
            'nombre_dispositivo.required' => 'El nombre de dispositivo es obligatorio',
            'nombre_dispositivo.unique' => 'Este nombre de dispositivo ya está seleccionado',
            'tipo_dispositivo.required' => 'El tipo de dispositivo es obligatorio',
            'zona_trabajo.required' => 'La zona de trabajo es obligatoria',
            'marca.required' => 'La marca es obligatoria',
            'modelo.required' => 'El modelo es obligatorio',
            'ip_principal.required' => 'La IP principal es obligatoria',
            'cabildo.required' => 'El campo cabildo es obligatorio',
            'conexion.required' => 'La conexion es obligatoria',
        ]);

        $dispositivo = Dispositivo::create([

            'nombre_dispositivo' => $data['nombre_dispositivo'],
            'numero_serie' => $data['numero_serie'],
            'tipo_dispositivo' => $data['tipo_dispositivo'],
            'conexion' => $data['conexion'],
            'zona_trabajo' => $data['zona_trabajo']

        ]);

        $impresora = Impresora::create([

            'nombre_dispositivo' => $data['nombre_dispositivo'],
            'id_dispositivo' => $dispositivo->id,
            'marca' => $data['marca'],
            'modelo' => $data['modelo'],
            'ip_principal' => $data['ip_principal'],
            'ip_secundaria' => $data['ip_secundaria'],
            'cabildo' => $data['cabildo'],
            'observaciones' => $data['observaciones']

        ]);

        return redirect('/dispositivos')->with('mensaje','Impresora añadida correctamente');
    }

    public function edit($id){

        return Inertia::render('Dispositivos/Impresoras/Edit',[

            'dispositivo' => Dispositivo::find($id),
            'impresora' => Impresora::where('id_dispositivo',$id)->first()

        ]);

    }   

    public function update(Request $request,$id){

        $request->validate([

            'nombre_dispositivo' => ['required'],
            'numero_serie' => ['nullable'],
            'tipo_dispositivo' => ['required'],
            'zona_trabajo' => ['required'],
            'conexion' => ['required'],
            'ip_principal'=> ['required'],
            'ip_secundaria' => ['nullable'],
            'cabildo' => ['required'],
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

        $impresora = Impresora::where('id_dispositivo',$id);

        $impresora->update([

            'nombre_dispositivo' => $request->nombre_dispositivo,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'ip_principal' => $request->ip_principal,
            'ip_secundaria' => $request->ip_secundaria,
            'cabildo' => $request->cabildo,
            'observaciones' => $request->observaciones

        ]);

        return redirect('/dispositivos')->with('mensaje','Impresora actualizada correctamente');

    }

    public function delete($id){

        Dispositivo::find($id)->delete();
        
        return redirect('/dispositivos')->with('mensaje','Impresora eliminada correctamente');

    }

    public function show($id) {

        return Inertia::render('Dispositivos/Impresoras/Show',[

            'dispositivo' => Dispositivo::find($id),
            'impresora' => Impresora::where('id_dispositivo',$id)->first()
        ]);


    }


}
