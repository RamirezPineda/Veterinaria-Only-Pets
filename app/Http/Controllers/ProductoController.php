<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\NotaIngreso;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\VentaProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Http;

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
        $foto_url = cloudinary()->upload($request->file('foto')->getRealPath())->getSecurePath();
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'costo' => $request->costo,
            'precio' => $request->precio,
            'marca' => $request->marca,
            'cantidad' => 0,    
            'id_categoria' => $request->id_categoria,
            'foto' => $foto_url,
        ]);

        try {
            $categoria = Categoria::find($request->id_categoria);


            $data =  [ 
                'id' => $producto->id,
                'nombre' => $request->nombre,
                'marca' => $request->marca,
                'descripcion' => $request->descripcion,
                'categoria' => $categoria->nombre,
            ];

            Http::post('http://localhost:3000/api/productos', $data);

        } catch (\Throwable $th) {
            //throw $th;
        }

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

    public function datas($id)
    {
        $producto = Producto::find($id);
        return $producto;
    }

    public function comprar(Request $request) 
    {
        $fin = strpos($request->id_producto, ',');
        $id_producto = substr($request->id_producto, 0, $fin);


        $prod = Producto::find($id_producto);
        $prod->costo = $request->costo;

        $iva = 0.13;
        $utilidad = 0.25; # utilidad ganada por cada producto vendido
        $precioCosto = $request->costo  - ($request->costo * $iva);
        $precioVenta = $precioCosto / (1 - $utilidad);

        $prod->precio = intval($precioVenta / (1 - $iva) );
        $prod->save();

        NotaIngreso::create([
            'id_proveedor' => $request->id_proveedor,
            'id_administrativo' => @Auth::user()->id,
            'id_producto' => $id_producto,
            'monto_total' => $request->monto_total,
            'fecha' => date('Y-m-d'),
            'hora' => date('H:i:s'),
            'cantidad' => $request->cantidad
        ]);
        //Actualizando el stock del producto
        $producto = Producto::find($id_producto);
        $producto->cantidad = $producto->cantidad + $request->cantidad;
        $producto->save();

        return redirect(route('compras.index'));
    }

    public function vender(Request $request) 
    {
        $fin = strpos($request->id_producto, ',');
        $id_producto = substr($request->id_producto, 0, $fin);
        $producto =  Producto::find($id_producto);
        $stock = $producto->cantidad - $request->cantidad;
        if ($stock < 0) {
            return redirect()->route('productos.index')
            ->withErrors('Error', 'Stock insuficiente del producto');
        }
        //Actualizacion del stock del producto
        $producto->cantidad = $stock;
        $producto->save();

        //@Auth::user()->id es el id del administrativo
        $venta = Venta::create([
            'fecha' => date('Y-m-d'),
            'id_administrativo' => '1',
            'id_cliente' => $request->id_cliente,
            'total' => $request->total,
            'concepto' => $request->concepto,
        ]);
        VentaProducto::create([
            'id_venta' => $venta->id,
            'monto' => $request->total,
            'cantidad' => $request->cantidad,
            'id_producto' => $id_producto,
        ]);
        return redirect(route('ventas.index'));
    }

}
