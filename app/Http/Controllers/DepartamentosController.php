<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use App\Models\Departamento;
use Inertia\Inertia;

class DepartamentosController extends Controller
{
    
    public function getdepartamentos(){

        $departamentos = Departamento::all();

        return $departamentos;

    }

        public function crear(){

            return Inertia::render('Dispositivos/Departamentos');

        }


        public function store(){


            $data = RequestFacade::validate([

                'nombre' => ['required','unique:departamentos']
            ],
            [
                'nombre.required' => 'El nombre es obligatorio',
                'nombre.unique' => 'Este departamento ya está añadido'

            ]
            );

             Departamento::create([

                'nombre' => $data['nombre']

            ]);

            return redirect('/dispositivos')->with('mensaje','Departamento añadido correctamente');

        }

}
