<?php

namespace App\Http\Controllers;

use App\Models\ClienteMascota;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;

        $mascotas = Mascota::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('raza', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('sexo', 'LIKE', '%' . $busqueda . '%')
            ->latest('id')
            ->paginate(7);

        $data = [
            'mascota' => $mascotas,
            'busqueda' => $busqueda,
        ];

        $mascotas->load('propietario');

        return view('mascotas.index', compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mascota = Mascota::create([
            'nombre' => $request->nombre,
            'especie' => $request->especie,
            'fecha_nacimiento' => $request->fecha_de_nacimiento,
            'raza' => $request->raza,
            'sexo' => $request->sexo,
            'descripcion' => $request->descripcion,
        ]);

        foreach ($request->duenhos as $duenho) {
            ClienteMascota::create([
                'id_mascota' => $mascota->id,
                'id_cliente' => $duenho,
            ]);
        }

        return redirect()->route('mascotas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascota)
    {
        // if(Auth::user()->hasRole('cliente')){
        //     if(!Gate::allows('view', $mascota))
        //         return redirect()->back();
        // }

        return view('mascota.show', compact('mascota'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mascota $mascota)
    {
        return view('mascota.show', compact('mascota'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->update([
            'nombre' => $request->nombre,
            'especie' => $request->especie,
            'fecha_nacimiento' => $request->fecha_de_nacimiento,
            'raza' => $request->raza,
            'sexo' => $request->sexo,
            'descripcion' => $request->descripcion,
        ]);

        $propietariosN = $request->duenhos;
        foreach ($mascota->propietario as $propietario) {
            if (!in_array($propietario->id, $request->duenhos)) {
                clienteMascota::where('id_mascota', $mascota->id)
                    ->where('id_cliente', $propietario->id)
                    ->delete();
            } else {
                unset($propietariosN[array_search($propietario->id, $request->duenhos)]);
            }
        }

        foreach ($propietariosN as $propietario) {
            ClienteMascota::create([
                'id_cliente' => $propietario,
                'id_mascota' => $mascota->id,
            ]);
        }

        return redirect()->route('mascotas.index');

    }

    
    public function datas($id){
        $mascotas = Mascota::find($id);
        $mascotas->load('propietario');
        return $mascotas;
    }

    public function myPets(){
        $mascotas = Auth::user()->persona->mascotas;
        return view('mascotas.myPets', compact('mascotas'));
    }
}
