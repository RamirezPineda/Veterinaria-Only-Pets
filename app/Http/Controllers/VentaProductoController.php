<?php

namespace App\Http\Controllers;

use App\Models\VentaProducto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $ventas->load('producto');
        
        return view('ventas.index', compact('ventas'));
    }

    public function pdf($id)
    {
        $venta = VentaProducto::findOrFail($id);
        $venta->load('producto');
        $venta->load('venta');
        $pdf = PDF::loadView('ventas.pdf', ['venta' => $venta]);
        return $pdf->download('ventas.pdf');
    }
}
