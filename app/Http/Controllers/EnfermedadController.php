<?php

namespace App\Http\Controllers;

use App\Models\Enfermedad;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $enfermedades = Enfermedad::get();
        $busqueda = $request->busqueda;
        $enfermedades = Enfermedad::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('id', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'enfermedad' => $enfermedades,
            'busqueda' => $busqueda,
        ];
        return view('enfermedades.index', compact('enfermedades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Enfermedad::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo
        ]);

        return redirect(route('enfermedades.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enfermedad = Enfermedad::findOrFail($id);
        return view('enfermedades.show', compact('enfermedad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enfermedad $enfermedad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $enfermedad = Enfermedad::findOrFail($id);
        $data = ([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
        ]);
        $enfermedad->update($data);

        return redirect()->route('enfermedades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $enfermedad = Enfermedad::findOrFail($id);
        $enfermedad->delete();

        return redirect()->route('enfermedades.index');
    }
    
    public function datas($id)
    {
        $enfermedad = Enfermedad::find($id);
        return $enfermedad;
    }
}
