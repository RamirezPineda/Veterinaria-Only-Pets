<?php

namespace App\Http\Controllers;

use App\Models\Vacuna;
use Illuminate\Http\Request;

class VacunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacunas = Vacuna::get();
        return view('vacunas.index', compact('vacunas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vacunas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'string|required|max:20|min:3'
        ]);

        Vacuna::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('vacunas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vacuna = Vacuna::findOrFail($id);
        $vacuna->delete();

        return redirect()->route('vacunas.index');
    }
}
