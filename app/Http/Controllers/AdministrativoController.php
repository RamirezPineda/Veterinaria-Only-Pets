<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $admins = Administrativo::get();
        $admins->load('persona');
        return view('administrativo.index', compact('admins'));
    }

    public function create() {
        return view('administrativo.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:20',
            'apellido_paterno' => 'required|string|max:20',
            'apellido_materno' => 'required|string|max:20',
            'ci' => 'nullable|string|max:10|unique:personas,ci',
            'direccion' => 'nullable|string|max:254',
            'email' => 'required|email|max:40|unique:personas,email',
            'fecha_de_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|in:M,F',
        ]);

        $persona = Persona::create([
            'nombre'           => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email'            => $request->email,
            'direccion'        => $request->direccion,
            'fecha_de_nacimiento' => $request->fecha_de_nacimiento,
            'sexo'             => $request->sexo,
            'ci'               => $request->ci,
        ]);

        Administrativo::create([
            'id'        => $persona->id,
            'profesion' => $request->profesion,
        ]);


        Usuario::create([
            'nombre_usuario' => $request->email,
            'password'       => bcrypt($request->ci),
            'enable'         => '1',
            'id_persona'     => $persona->id,
        ]);
        
        return redirect()->route('administrativos.index');
    }

    public function edit(Administrativo $administrativo) {
        return view('administrativo.edit', compact('administrativo'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nombre' => 'required|string|max:20',
            'apellido_paterno' => 'required|string|max:20',
            'apellido_materno' => 'required|string|max:20',
            'ci' => 'nullable|string|max:10',
            'direccion' => 'nullable|string|max:254',
            'email' => 'required|email|max:40',
            'fecha_de_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|in:M,F',
        ]);

        $persona = Persona::findOrFail($id);
        $administrativo = Administrativo::findOrFail($id);

        $administrativo->profesion = $request->profesion;
        $data = ([
            'nombre'              => $request->nombre,
            'apellido_paterno'    => $request->apellido_paterno,
            'apellido_materno'    => $request->apellido_materno,
            'email'               => $request->email,
            'ci'                  => $request->ci,
            'direccion'           => $request->direccion,
            'fecha_de_nacimiento' => $request->fecha_de_nacimiento,
            'sexo'                => $request->sexo,
        ]);

        $persona->update($data);
        $administrativo->update();

        return redirect()->route('administrativos.index');
    }


    public function datas($id){
        $admin = Administrativo::find($id);
        $admin->load('persona');
        return $admin;
    }
    
    public function show(Administrativo $administrativo) {
        return view('administrativo.show', compact('administrativo'));

    }

}
