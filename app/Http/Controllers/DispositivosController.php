<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Dispositivo;
use App\Models\User;
use Illuminate\Support\Facades\Request as RequestFacade;

class DispositivosController extends Controller
{


        public function index(){        

            return Inertia::render('Home',[

            'dispositivos' =>Dispositivo::query()
                          ->when(RequestFacade::input('busqueda'), function($query,$busqueda) {
                          $query->where('nombre_dispositivo','like','%'.$busqueda.'%')
                          ->orWhere('dominio','like','%'.$busqueda.'%')
                          ->orWhere('numero_serie','like','%'.$busqueda.'%')
                          ->orWhere('tipo_dispositivo','like','%'.$busqueda.'%')
                          ->orWhere('conexion','like','%'.$busqueda.'%')
                          ->orWhere('ip1','like','%'.$busqueda.'%')
                          ->orWhere('ip2','like','%'.$busqueda.'%')
                          ->orWhere('procesador','like','%'.$busqueda.'%')
                          ->orWhere('so','like','%'.$busqueda.'%')
                          ->orWhere('ram','like','%'.$busqueda.'%')
                          ->orWhere('programa_ofimatica','like','%'.$busqueda.'%')
                          ->orWhere('licencia_office','like','%'.$busqueda.'%')
                          ->orWhere('licencia_windows','like','%'.$busqueda.'%')
                          ->orWhere('correo_office','like','%'.$busqueda.'%')
                          ->orWhere('discoduro','like','%'.$busqueda.'%')
                          ->orWhere('departamento','like','%'.$busqueda.'%')
                          ->orWhere('usuario_principal','like','%'.$busqueda.'%')
                          ->orWhere('usuario_dominio','like','%'.$busqueda.'%')
                          ->orWhere('zona_trabajo','like','%'.$busqueda.'%')
                          ->orWhere('tecnico_informatico','like','%'.$busqueda.'%')
                          ->orWhere('observaciones','like','%'.$busqueda.'%');

                        })->paginate(10)
                          ->withQueryString(),
                        
                    ]);

                

        }

    
        public function crear(){


            return Inertia::render('Dispositivos/Create');

        }


        public function store(){


            $data = RequestFacade::validate([

                'nombre_dispositivo' => ['required'],
                'dominio' => ['required'],
                'numero_serie' => ['nullable'],
                'tipo_dispositivo' => ['required'],
                'conexion' => ['required'],
                'ip1' => ['required'],
                'ip2' => ['nullable'],
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
                'fecha_instalacion' => ['required'],
                'tecnico_informatico' => ['required'],
                'observaciones' => ['nullable'],

            ],

            [
                'nombre_dispositivo.required' => 'El nombre de dispositivo es obligatorio',
                'dominio.required' => 'El dominio es obligatorio',
                'tipo_dispositivo.required' => 'El tipo de dispositivo es obligatorio',
                'conexion.required' => 'La conexión es obligatoria',
                'ip1.required' => 'La IP1 es obligatoria',
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
            ]

            );



            $dispositivo = Dispositivo::create([

                'nombre_dispositivo' => $data['nombre_dispositivo'],
                'dominio' => $data['dominio'],
                'numero_serie' => $data['numero_serie'],
                'tipo_dispositivo' => $data['tipo_dispositivo'],
                'conexion' => $data['conexion'],
                'ip1' => $data['ip1'],
                'ip2' => $data['ip2'],
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
                'zona_trabajo' => $data['zona_trabajo'],
                'cabildo' => $data['cabildo'],
                'fecha_instalacion' => $data['fecha_instalacion'],
                'tecnico_informatico' => $data['tecnico_informatico'],
                'observaciones'=> $data['observaciones'],
            ]);


            return redirect('/dispositivos')->with('mensaje','Dispositivo añadido correctamente');
            
        }

        public function mostrar($id) {


            return Inertia::render('Dispositivos/Show',[

                'dispositivo' => Dispositivo::find($id)
            ]);


        }


        public function editar($id){


            return Inertia::render('Dispositivos/Edit', [

                'dispositivo' => Dispositivo::find($id)

            ]);

        }

        public function actualizar(Request $request,$id){


            $request->validate([

                'nombre_dispositivo' => ['required'],
                'dominio' => ['required'],
                'numero_serie' => ['nullable'],
                'tipo_dispositivo' => ['required'],
                'conexion' => ['required'],
                'ip1' => ['required'],
                'ip2' => ['nullable'],
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
            ]);


            $dispositivo = Dispositivo::where('id',$id);

            $dispositivo->update([

                'nombre_dispositivo' => $request->nombre_dispositivo,
                'dominio' => $request->dominio,
                'numero_serie' => $request->numero_serie,
                'tipo_dispositivo' => $request->tipo_dispositivo,
                'conexion' => $request->conexion,
                'ip1' => $request->ip1,
                'ip2' => $request->ip2,
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
                'zona_trabajo' => $request->zona_trabajo,
                'cabildo' => $request->cabildo,
                'tecnico_informatico' => $request->tecnico_informatico,
                'observaciones'=> $request->observaciones,

            ]);

            return redirect('/dispositivos')->with('mensaje','Dispositivo actualizado correctamente');

        }
        

        public function eliminar($id){


            Dispositivo::find($id)->delete();

            return redirect('/dispositivos')->with('mensaje','Dispositivo eliminado correctamente');

        }

}
