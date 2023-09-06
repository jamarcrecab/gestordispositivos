<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dispositivo;
use App\Models\Telefono;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;


class TelefonosController extends Controller
{
    public function store(){

        $data = RequestFacade::validate([

            'nombre_dispositivo' => ['required','unique:dispositivos'],
            'numero_serie' => ['nullable'],
            'tipo_dispositivo' => ['required'],
            'conexion' => ['required'],
            'zona_trabajo' => ['required'],
            'marca' => ['required'],
            'modelo' => ['required'],
            'usuario_principal' => ['required'],
            'numero_telefono' => ['required'],
            'departamento' => ['required'],
            'correo' => ['nullable'],
            'observaciones' => ['nullable']
        
        ],
    
        [
            'nombre_dispositivo.required' => 'El nombre de dispositivo es obligatorio',
            'tipo_dispositivo.required' => 'El tipo de dispositivo es obligatorio',
            'conexion.required' => 'La conexión es obligatoria',
            'marca.required' => 'La marca es obligatoria',
            'zona_trabajo.required' => 'La zona de trabajo es obligatoria',
            'modelo.required' => 'El modelo es obligatorio',
            'usuario_principal' => 'El usuario es obligatorio',
            'numero_telefono.required' => 'El teléfono es obligatorio',
            'departamento.required' => 'El departamento es obligatorio',
        ]);

        $dispositivo = Dispositivo::create([

            'nombre_dispositivo' => $data['nombre_dispositivo'],
            'numero_serie' => $data['numero_serie'],
            'tipo_dispositivo' => $data['tipo_dispositivo'],
            'conexion' => $data['conexion'],
            'zona_trabajo' => $data['zona_trabajo']
        ]);

        $telefono = Telefono::create([

            'nombre_dispositivo' => $data['nombre_dispositivo'],
            'id_dispositivo' => $dispositivo->id,
            'marca' => $data['marca'],
            'modelo' => $data['modelo'],
            'usuario_principal' => $data['usuario_principal'],
            'numero_telefono' => $data['numero_telefono'],
            'departamento' => $data['departamento'],
            'correo' => $data['correo']
 
        ]);

        return redirect('/dispositivos')->with('mensaje','Teléfono añadido correctamente');
    }

    public function edit($id){

        return Inertia::render('Dispositivos/Telefonos/Edit',[

            'dispositivo' => Dispositivo::find($id),
            'telefono' => Telefono::where('id_dispositivo',$id)->first()
        ]);

    }

    public function update(Request $request,$id){

        $request->validate([

            'nombre_dispositivo' => ['required'],
            'numero_serie' => ['nullable'],
            'tipo_dispositivo' => ['required'],
            'conexion' => ['required'],
            'zona_trabajo' => ['required'],
            'marca' => ['required'],
            'modelo' => ['required'],
            'usuario_principal' => ['required'],
            'numero_telefono' => ['required'],
            'departamento' => ['required'],
            'correo' => ['nullable'],
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

        $telefono = Telefono::where('id_dispositivo',$id);

        $telefono->update([

            'nombre_dispositivo' => $request->nombre_dispositivo,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'usuario_principal' => $request->usuario_principal,
            'numero_telefono' => $request->numero_telefono,
            'departamento' => $request->departamento,
            'correo' => $request->correo,
            'observaciones' => $request->observaciones

        ]);

        return redirect('/dispositivos')->with('mensaje','Teléfono actualizado correctamente');

    }

    public function delete($id){

        Dispositivo::find($id)->delete();
        
        return redirect('/dispositivos')->with('mensaje','Teléfono eliminado correctamente');

    }

    public function show($id) {

        return Inertia::render('Dispositivos/Telefonos/Show',[

            'dispositivo' => Dispositivo::find($id),
            'telefono' => Telefono::where('id_dispositivo',$id)->first()
        ]);


    }

}
