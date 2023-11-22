<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Usuario;
use App\Models\Veterinario;
use Illuminate\Http\Request;

class VeterinarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veterinarios = Veterinario::get();
        $veterinarios->load('persona');
        return view('veterinarios.index', compact('veterinarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        Veterinario::create([
            'id'        => $persona->id,
            'profesion' => $request->profesion,
            'id_servicio' => $request->servicio,
        ]);

        Usuario::create([
            'nombre_usuario' => $request->email,
            'password'       => bcrypt($request->ci),
            'enable'         => '1',
            'id_persona'     => $persona->id,
        ]);

        return redirect()->route('veterinarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Veterinario $veterinario)
    {
        return view('administrativo.show', compact('veterinario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veterinario $veterinario)
    {
        return view('clientes.edit', compact('veterinario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
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
        $veterinario = Veterinario::findOrFail($id);

        $veterinario->profesion = $request->profesion;
        $veterinario->id_servicio = $request->servicio;
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
        $veterinario->update();

        return redirect()->route('veterinarios.index');
    }

    
    public function datas($id)
    {
        $veterinario = Veterinario::find($id);
        $veterinario->load('turno');
        $veterinario->load('persona');
        $veterinario->persona->load('telefonos');
        return $veterinario;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veterinario $veterinario)
    {
        //
    }
}
