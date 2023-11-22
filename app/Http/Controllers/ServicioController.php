<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $servicios = Servicio::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('precio', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'servicio' => $servicios,
            'busqueda' => $busqueda,
        ];
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicio.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Servicio::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio
        ]);

        return redirect(route('servicios.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        return view('servicios.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        return view('administrativo.create', compact('servicio'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);
        $data = ([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
        ]);
        $servicio->update($data);

        return redirect()->route('servicios.index');
    }

}
