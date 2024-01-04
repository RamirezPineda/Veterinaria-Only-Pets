<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\VentaServicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Support\Facades\Http;

class VentaServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $solicitudes = VentaServicio::where('id_servicio', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('id_venta', 'LIKE', '%' . $busqueda . '%')
            ->latest('id')
            ->paginate(7);
        $data = [
            'solicitudes' => $solicitudes,
            'busqueda' => $busqueda,
        ];
        // $solicitudes->load('cliente');
        $solicitudes->load('servicio');
        $solicitudes->load('venta');
        $solicitudes->load('mascota');

        return view('ventas-servicios.index', compact('solicitudes'));
    }
    
        /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $solicitud = VentaServicio::findOrFail($id);
        $solicitud->load('mascota');
        $solicitud->load('servicio');
        $solicitud->load('venta');
        return view('ventas-servicios.show', compact('solicitud'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fecha = Carbon::now();
        $venta = Venta::create([
            'fecha' => $fecha->toDateString(),
            'concepto' => $request->concepto,
            'total' => $request->total,
            'id_administrativo' => 1,
            'id_cliente' => $request->id_cliente,
            // 'id_administrativo' => Auth::user()->id,
        ]);

        $cantidad = 0;

        if (is_null($request->servicios)) {
            VentaServicio::create([
                'id_servicio' => null,
                'id_venta' => $venta->id,
                'id_mascota' => $request->id_mascota,
            ]);
            $cantidad += 1;
        } else {
            foreach ($request->servicios as $servicio) {
                VentaServicio::create([
                    'id_servicio' => $servicio,
                    'id_venta' => $venta->id,
                    'id_mascota' => $request->id_mascota,
                ]);
                $cantidad += 1;
            }
        }

        try {

            $data =  [ 
                'id' => $venta->id + 10,
                'administrativo_id' => Auth::user()->id,
                'servicio_id' => $request->servicios[0],
                'cliente_id' => $request->id_cliente,
                'mascota_id' => $request->id_mascota,
                'concepto' => 'servicio',
                'cantidad' => $cantidad,
                'precio_total' => $request->total,
            ];

            Http::post('http://localhost:3000/api/facturas', $data);

        } catch (\Throwable $th) {
            //throw $th;
            // echo "ocurrio un error";
        }

        return redirect(route('ventas-servicios.index'));
    }

    public function pdf($id)
    {
        $solicitud = VentaServicio::findOrFail($id);
        $solicitud->load('mascota');
        $solicitud->load('servicio');
        $solicitud->load('venta');
        $solicitud->load('cliente');
        $pdf = PDF::loadView('ventas-servicios.pdf',['solicitud'=>$solicitud]);
        return $pdf->download('recibo.pdf');
    }

}
