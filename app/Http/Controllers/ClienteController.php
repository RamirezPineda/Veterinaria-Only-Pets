<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        $clientes->load('persona');
        return view('clientes.index', compact('clientes'));
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
            'ci' => 'nullable|string|max:10|unique:personas,ci',
            'direccion' => 'nullable|string|max:254',
            'email' => 'required|email|max:40|unique:personas,email',
            'fecha_de_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|in:M,F',
        ]);

        $persona = Persona::create([
            'nombre' => $request->input('nombre'),
            'apellido_paterno' => $request->input('apellido_paterno'),
            'apellido_materno' => $request->input('apellido_materno'),
            'ci' => $request->input('ci'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email'),
            'fecha_de_nacimiento' => $request->input('fecha_de_nacimiento'),
            'sexo' => $request->input('sexo'),
        ]);

        $cliente = Cliente::create([
            'id' => $persona->id,
        ]);

        $usuario = Usuario::create([
            'nombre_usuario' => $request->input('email'),
            'password' => bcrypt($request->input('ci')),
            'enable' => '1',
            'id_persona' => $persona->id,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
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

        $cliente->persona->update([
            'nombre' => $request->input('nombre'),
            'apellido_paterno' => $request->input('apellido_paterno'),
            'apellido_materno' => $request->input('apellido_materno'),
            'ci' => $request->input('ci'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email'),
            'fecha_de_nacimiento' => $request->input('fecha_de_nacimiento'),
            'sexo' => $request->input('sexo'),
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado con éxito.');
    }
}

