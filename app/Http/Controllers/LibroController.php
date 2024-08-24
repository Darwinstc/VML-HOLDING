<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all();

        return response()->json($libros,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'ano_publicacion' => 'required|date_format:Y-m-d',
            'genero' => 'required|char|max:1',
            'numero_paginas' => 'required|integer',
            'idioma' => 'required|string|max:50',
            'resumen' => 'required|string',
            'cantidad_ejemplares' => 'required|integer',
            'cantidad_stock' => 'required|integer',
            'estado' => 'required|char|max:1',
        ]);

        $libro = Libro::create($validatedData);

        return response()->json($libro, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);

        return response()->json($libro,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'autor' => 'sometimes|string|max:255',
            'editorial' => 'sometimes|string|max:255',
            'ano_publicacion' => 'sometimes|date_format:Y-m-d',
            'genero' => 'sometimes|char|max:1',
            'numero_paginas' => 'sometimes|integer',
            'idioma' => 'sometimes|string|max:50',
            'resumen' => 'sometimes|string',
            'cantidad_ejemplares' => 'sometimes|integer',
            'cantidad_stock' => 'sometimes|integer',
            'estado' => 'sometimes|char|max:1',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->update($validatedData);

        return response()->json($libro);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return response()->noContent();
    }
}
