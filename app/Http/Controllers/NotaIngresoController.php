<?php

namespace App\Http\Controllers;

use App\Models\NotaIngreso;
use Illuminate\Http\Request;

class NotaIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $compras = NotaIngreso::where('id', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('cantidad', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('monto_total', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('fecha', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'servicio' => $compras,
            'busqueda' => $busqueda,
        ];
        return view('compras.index', compact('compras'));
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $compras = NotaIngreso::findOrFail($id);
        return view('compras.show', compact('compras'));
    }

}
