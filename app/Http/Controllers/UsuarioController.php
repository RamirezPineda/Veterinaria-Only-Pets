<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $usuarios = Usuario::where('nombre_usuario', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('enable', 'LIKE', '%' . $busqueda . '%')
            ->latest('id')
            ->paginate(10);
        $data = [
            'usuario' => $usuarios,
            'busqueda' => $busqueda,
        ];
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $persona = Persona::create([
            'nombre'           => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email'            => $request->email,
        ]);
        Cliente::create(['id' => $persona->id]);
        $usuario = Usuario::create([
            'nombre_usuario' => $request->nombre_usuario,
            'password'       => bcrypt($request->password),
            'enable'         => '1',
            'id_persona'     => $persona->id,
        ]);

        return view('auth.login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }
}
