<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use App\Models\Zona;
use Inertia\Inertia;

class ZonasController extends Controller
{
    

        public function crear(){

            return Inertia::render('Dispositivos/Zonas');

        }

        public function getzonas(){

            $zonas = Zona::all();

            return $zonas;

        }

        public function store(){


            $data = RequestFacade::validate([

                'nombre' => ['required','unique:zonas']
            ],
            [
                'nombre.required' => 'El nombre es obligatorio',
                'nombre.unique' => 'Este departamento ya está añadido'

            ]
            );

             Zona::create([

                'nombre' => $data['nombre']

            ]);

            return redirect('/dispositivos')->with('mensaje','Zona de Trabajo añadida correctamente');

        }

}
