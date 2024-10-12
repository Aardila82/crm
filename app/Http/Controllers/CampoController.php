<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use Illuminate\Http\Request;

class CampoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campos = Campo::all();
        return view('campos.index', compact('campos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_campo' => 'required|string|max:255',
            'tipo_campo' => 'required|string|max:255',
            'estado' => 'required|in:activo,inactivo',
        ]);

        Campo::create($request->all());
        return redirect()->route('campos.index')->with('success', 'Campo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Campo $campo)
    {
        return view('campos.show', compact('campo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campo $campo)
    {
        return view('campos.edit', compact('campo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campo $campo)
    {
        $request->validate([
            'nombre_campo' => 'required|string|max:255',
            'tipo_campo' => 'required|string|max:255',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $campo->update($request->all());
        return redirect()->route('campos.index')->with('success', 'Campo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campo $campo)
    {
        $campo->delete();
        return redirect()->route('campos.index')->with('success', 'Campo eliminado exitosamente.');
    }
}
