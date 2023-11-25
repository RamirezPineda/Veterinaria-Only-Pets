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
     * Display the specified resource.
     */
    public function show(HistorialClinico $historiale)
    {
        return view('historiales.show', compact('historiale'));
    }

}
