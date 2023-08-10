<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivo;
use App\Models\Ordenador;
use Illuminate\Support\Facades\Request as RequestFacade;
use Inertia\Inertia;

class OrdenadorController extends Controller
{
    

    public function store(){

        $data = RequestFacade::validate([

            'nombre_dispositivo' => ['required','unique:dispositivos'],
            'numero_serie' => ['nullable'],
            'tipo_dispositivo' => ['required'],
            'conexion' => ['required'],
            'zona_trabajo' => ['required'],
            'ip_principal' => ['required'],
            'ip_secundaria' => ['nullable'],
            'procesador' => ['required'],
            'so' => ['required'],
            'ram' => ['required'],
            'discoduro' => ['required'],
            'programa_ofimatica' => ['required'],
            'licencia_office' => ['nullable'],
            'licencia_windows' => ['nullable'],
            'correo_office' => ['nullable'],
            'dominio' => ['required'],
            'usuario_principal' => ['required'],
            'usuario_dominio' => ['required'],
            'departamento' => ['required'],
            'cabildo' => ['required'],
            'fecha_instalacion' => ['required'],
            'tecnico_informatico' => ['required'],
            'observaciones' => ['nullable'],
        ],
        
        [
            'nombre_dispositivo.required' => 'El nombre de dispositivo es obligatorio',
            'tipo_dispositivo.required' => 'El tipo de dispositivo es obligatorio',
            'conexion.required' => 'La conexión es obligatoria',
            'zona_trabajo.required' => 'La zona de trabajo es obligatoria',
            'ip_principal.required' => 'La ip_principal es obligatoria',
            'dominio.required' => 'El dominio es obligatorio',
            'procesador.required' => 'El procesador es obligatorio',
            'so.required' => 'El sistema operativo es obligatorio',
            'ram.required' => 'La RAM es obligatoria',
            'programa_ofimatica.required' => 'El programa ofimática es obligatorio',
            'discoduro.required' => 'El disco duro es obligatorio',
            'departamento.required' => 'El departamento es obligatorio',
            'usuario_principal.required' => 'El usuario principal es obligatorio',
            'usuario_dominio.required' => 'El usuario del dominio es obligatorio',
            'zona_trabajo.required' => 'La zona de trabajo es obligatoria',
            'cabildo.required' => 'El campo cabildo tiene que estar marcado',
            'fecha_instalacion' => 'La fecha de instalación es obligatoria',
            'tecnico_informatico.required' => 'La persona de instalación es obligatoria'
        ]);

        $dispositivo = Dispositivo::create([

            'nombre_dispositivo' => $data['nombre_dispositivo'],
            'numero_serie' => $data['numero_serie'],
            'tipo_dispositivo' => $data['tipo_dispositivo'],
            'conexion' => $data['conexion'],
            'zona_trabajo' => $data['zona_trabajo']

        ]);

        $ordenador = Ordenador::create([

            'nombre_dispositivo' => $data['nombre_dispositivo'],
            'id_dispositivo' => $dispositivo->id,
            'ip_principal' => $data['ip_principal'],
            'ip_secundaria' => $data['ip_secundaria'],
            'dominio' => $data['dominio'],
            'procesador' => $data['procesador'],
            'so' => $data['so'],
            'ram' => $data['ram'],
            'programa_ofimatica' => $data['programa_ofimatica'],
            'licencia_office' => $data['licencia_office'],
            'licencia_windows' => $data['licencia_windows'],
            'correo_office' => $data['correo_office'],
            'discoduro' => $data['discoduro'],
            'departamento' => $data['departamento'],
            'usuario_principal' => $data['usuario_principal'],
            'usuario_dominio' => $data['usuario_dominio'],
            'cabildo' => $data['cabildo'],
            'fecha_instalacion' => $data['fecha_instalacion'],
            'tecnico_informatico' => $data['tecnico_informatico'],
            'observaciones'=> $data['observaciones'],

        ]);

        return redirect('/dispositivos')->with('mensaje','Ordenador añadido correctamente');

    }

    public function edit($id){

        return Inertia::render('Dispositivos/Ordenadores/Edit',[

            'dispositivo' => Dispositivo::find($id),
            'ordenador' => Ordenador::where('id_dispositivo',$id)->first()
        ]);
    }

    public function update(Request $request,$id){

        $request->validate([

            'nombre_dispositivo' => ['required'],
            'numero_serie' => ['nullable'],
            'tipo_dispositivo' => ['required'],
            'zona_trabajo' => ['required'],
            'conexion' => ['required'],
            'ip_principal' => ['required'],
            'ip_secundaria' => ['nullable'],
            'dominio' => ['required'],
            'procesador' => ['required'],
            'so' => ['required'],
            'ram' => ['required'],
            'programa_ofimatica' => ['required'],
            'licencia_office' => ['nullable'],
            'licencia_windows' => ['nullable'],
            'correo_office' => ['nullable'],
            'discoduro' => ['required'],
            'departamento' => ['required'],
            'usuario_principal' => ['required'],
            'usuario_dominio' => ['required'],
            'zona_trabajo' => ['required'],
            'cabildo' => ['required'],
            'tecnico_informatico' => ['required'],
            'observaciones' => ['nullable'],

        ],
        [
            'tipo_dispositivo.required' => 'El tipo de dispositivo es obligatorio',
            'conexion.required' => 'La conexión es obligatoria',
            'zona_trabajo.required' => 'La zona de trabajo es obligatoria',
            'ip_principal.required' => 'La ip_principal es obligatoria',
            'dominio.required' => 'El dominio es obligatorio',
            'procesador.required' => 'El procesador es obligatorio',
            'so.required' => 'El sistema operativo es obligatorio',
            'ram.required' => 'La RAM es obligatoria',
            'programa_ofimatica.required' => 'El programa ofimática es obligatorio',
            'discoduro.required' => 'El disco duro es obligatorio',
            'departamento.required' => 'El departamento es obligatorio',
            'usuario_principal.required' => 'El usuario principal es obligatorio',
            'usuario_dominio.required' => 'El usuario del dominio es obligatorio',
            'zona_trabajo.required' => 'La zona de trabajo es obligatoria',
            'cabildo.required' => 'El campo cabildo tiene que estar marcado',
            'tecnico_informatico.required' => 'La persona de instalación es obligatoria'
        ]);

        $dispositivo = Dispositivo::where('id',$id);

        $dispositivo->update([

            'nombre_dispositivo' => $request->nombre_dispositivo,
            'numero_serie' => $request->numero_serie,
            'tipo_dispositivo' => $request->tipo_dispositivo,
            'conexion' => $request->conexion,
            'zona_trabajo' => $request->zona_trabajo

        ]);

        $ordenador = Ordenador::where('id_dispositivo',$id);

        $ordenador->update([

            'nombre_dispositivo' => $request->nombre_dispositivo,
            'ip_principal' => $request->ip_principal,
            'ip_secundaria' => $request->ip_secundaria,
            'procesador' => $request->procesador,
            'so' => $request->so,
            'ram' => $request->ram,
            'programa_ofimatica' => $request->programa_ofimatica,
            'licencia_office' => $request->licencia_office,
            'licencia_windows' => $request->licencia_windows,
            'correo_office' => $request->correo_office,
            'discoduro' => $request->discoduro,
            'departamento' => $request->departamento,
            'usuario_principal' => $request->usuario_principal,
            'usuario_dominio' => $request->usuario_dominio,
            'cabildo' => $request->cabildo,
            'tecnico_informatico' => $request->tecnico_informatico,
            'observaciones'=> $request->observaciones,
        ]);

        return redirect('/dispositivos')->with('mensaje','Ordenador actualizado correctamente');

    }

    public function delete($id){

        Dispositivo::find($id)->delete();

        return redirect('/dispositivos')->with('mensaje','Ordenador eliminado correctamente');

    }

    public function show($id) {


        return Inertia::render('Dispositivos/Ordenadores/Show',[

            'dispositivo' => Dispositivo::find($id),
            'ordenador' => Ordenador::where('id_dispositivo',$id)->first(),
        ]);


    }
}
