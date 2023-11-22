<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $categorias = Categoria::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'servicio' => $categorias,
            'busqueda' => $busqueda,
        ];
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categoria::create([
            'nombre' => $request->nombre,
        ]);
        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categorias = Categoria::find($id);
        $data = [
            'nombre' => $request->nombre,
        ];
        $categorias->update($data);
        return redirect(route('categorias.index'));
    }

    public function datas($id){
        $categorias = Categoria::find($id);
        return $categorias;
    }
}
