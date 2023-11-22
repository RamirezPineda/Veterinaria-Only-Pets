<?php

namespace App\Http\Controllers;

use App\Models\HistorialClinico;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HistorialClinico $historiale)
    {
        return view('historiales.show', compact('historiale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistorialClinico $historialClinico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistorialClinico $historialClinico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistorialClinico $historialClinico)
    {
        //
    }
}
