<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Tarjeta;
use Inertia\Inertia;
use PDF;

class TarjetaController extends Controller
{
    

    public function store(){

        $data = RequestFacade::validate([

            'nombre' => ['required'],
            'apellidos' => ['required'],
            'dni' => ['required'],
            'telefono' => ['required'],
            'extension' => ['required'],
            'pin' => ['required'],
            'puk' => ['required'],
            'departamento' => ['required'],
            'fecha_recogida' => ['required'],

        ],
        [

            'nombre.required' => 'El nombre es obligatorio',
            'apellidos.required' => 'Los apellidos son obligatorios',
            'dni.required' => 'El DNI es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'extension.required' => 'La extensión es obligatoria',
            'pin.required' => 'El PIN es obligatorio',
            'puk.required' => 'El PUK es obligatorio',
            'departamento.required' => 'El departamento es obligatorio',
            'fecha_recogida.required' => 'La fecha de recogida es obligatoria',

        ]);

        $tarjeta = Tarjeta::create([

            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'dni' => $data['dni'],
            'telefono' => $data['telefono'],
            'extension' => $data['extension'],
            'pin' => $data['pin'],
            'puk' => $data['puk'],
            'departamento' => $data['departamento'],
            'fecha_recogida' => $data['fecha_recogida']

        ]);

        return redirect('/dispositivos')->with('mensaje','Tarjeta añadida correctamente');

    }

    public function edit($id){

        return Inertia::render('Dispositivos/Tarjetas/Edit',[

            'tarjeta' => Tarjeta::find($id)

        ]);
    }

    public function update(Request $request,$id){

        $request-> validate([

            'nombre' => ['required'],
            'apellidos' => ['required'],
            'dni' => ['required'],
            'icc' => ['required'],
            'telefono' => ['required'],
            'extension' => ['required'],
            'pin' => ['required'],
            'puk' => ['required'],
            'tipo_contrato' => ['required'],
            'servicios_adicionales' => ['required'],
            'fecha_recogida' => ['required'],
            'fecha_alta' => ['required'],
            'estado' => ['required'],
            'foto_sim' => ['nullable'],
            'foto_firma' => ['nullable'],
            'departamento' => ['required'],

        ],
        [

            'nombre.required' => 'El nombre es obligatorio',
            'apellidos.required' => 'Los apellidos son obligatorios',
            'dni.required' => 'El DNI es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'extension.required' => 'La extensión es obligatoria',
            'pin.required' => 'El PIN es obligatorio',
            'puk.required' => 'El PUK es obligatorio',
            'departamento.required' => 'El departamento es obligatorio',
            'fecha_recogida.required' => 'La fecha de recogida es obligatoria',

        ]);

        $tarjeta = Tarjeta::where('id',$id);

        $tarjeta->update([

            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'extension' => $request->extension,
            'pin' => $request->pin,
            'puk' => $request->puk,
            'departamento' => $request->departamento,
            'fecha_recogida' => $request->fecha_recogida

        ]);

        return redirect('/dispositivos')->with('mensaje', 'Tarjeta actualizada correctamente');


    }

    public function show($id){


        return Inertia::render('Dispositivos/Tarjetas/Show',[

            'tarjeta' => Tarjeta::find($id),
        ]);


    }

    public function delete($id){

        Tarjeta::find($id)->delete();

        return redirect('/dispositivos')->with('mensaje','Tarjeta eliminada correctamente');

    }


}
