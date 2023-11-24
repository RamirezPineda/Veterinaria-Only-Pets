<?php

namespace App\Http\Controllers;

use App\Models\VentaProducto;
use Illuminate\Http\Request;

class VentaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $ventas = VentaProducto::where('id', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('cantidad', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('monto', 'LIKE', '%' . $busqueda . '%')
            ->paginate(7);
        $data = [
            'venta' => $ventas,
            'busqueda' => $busqueda,
        ];
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VentaProducto $ventaProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VentaProducto $ventaProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VentaProducto $ventaProducto)
    {
        //
    }
}
