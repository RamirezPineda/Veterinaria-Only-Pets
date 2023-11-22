<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $productos = Producto::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('precio', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('marca', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('costo', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'servicio' => $productos,
            'busqueda' => $busqueda,
        ];
        return view('productos.index', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'costo' => $request->costo,
            'precio' => $request->precio,
            'marca' => $request->marca,
            'cantidad' => 0,
            'foto' => $request->foto,
        ]);
        return redirect(route('productos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $producto = producto::find($id);
        $data = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'marca' => $request->marca,
            'costo' => $request->costo,
            'precio' => $request->precio,
            'id_categoria' => $request->id_categoria,
            'foto' => $request->foto,
        ];
        $producto->update($data);
        return redirect(route('productos.index'));
    }

}
