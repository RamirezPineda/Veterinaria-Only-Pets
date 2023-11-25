<?php

namespace App\Http\Controllers;

use App\Models\HistorialClinico;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HistorialClinicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historiales = HistorialClinico::get();
        return view('historiales.index', compact('historiales'));
    }

    /**
     * Display the specified resource.
     */
    public function show(HistorialClinico $historiale)
    {
        return view('historiales.show', compact('historiale'));
    }

    public function pdf($id)
    {
        $historiale = HistorialClinico::findOrFail($id);
        $pdf = PDF::loadView('historiales.pdf', ['historiale' => $historiale]);
        return $pdf->download('historial.pdf');
    }

}
