<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\Producto;
use App\Models\VentaServicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request as RequestGuzzle;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Response;


class HomeController extends Controller
{
    // private $BASE_URL ="http://127.0.0.1:3000";
    private $BASE_URL ="http://64.23.130.119:8080";
 
    public function index()
    
    {
        $client = new Client();
        $request = new RequestGuzzle('GET', $this->BASE_URL.'/api/getGananciaTotalMesYAnio');
        $res = $client->sendAsync($request)->wait();
        $ganancias = json_decode($res->getBody());


        $request = new RequestGuzzle('GET', $this->BASE_URL.'/api/getCantidadMascotasAtendidas');
        $res = $client->sendAsync($request)->wait();
        $mascotasAtendidasMesActual = json_decode($res->getBody());
        //    Log::info($ganancias->gananciaTodasLasVentas);
   
        $productos = Producto::all();
        $cantidadClientes = Cliente::count();
        $cantidadMascotas = Mascota::count();

        $primerDiaMesActual = Carbon::now()->startOfMonth();
        $ultimoDiaMesActual = Carbon::now()->endOfMonth();
        

        // return view('home.index', compact('productos', 'cantidadClientes', 'cantidadMascotas'));
        return view('home.index', compact('productos', 'cantidadClientes', 'cantidadMascotas','mascotasAtendidasMesActual','ganancias'));
    }


    public function uploadFile(Request $request)
    {
        $foto_url = cloudinary()->upload($request->file('foto')->getRealPath())->getSecurePath();
        return Response::json(['foto_url' => $foto_url], 200);
    }

}
