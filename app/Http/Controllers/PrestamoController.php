<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamo = Prestamo::with('bibliotecario', 'solicitante')->get();

        return response()->json($prestamo,200);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bibliotecario' => 'required|exists:users,id',
            'solicitante' => 'required|exists:users,id',
            'estado' => 'required|string|max:1',
            'cantidad' => 'required|integer',
            'fecha_prestamo' => 'required|date_format:Y-m-d',
            'fecha_devolucion' => 'required|date_format:Y-m-d',
        ]);

        $prestamo = Prestamo::create($validatedData);

        return response()->json($prestamo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prestamo = Prestamo::with('bibliotecario', 'solicitante')->findOrFail($id);

        return response()->json($prestamo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prestamo = Prestamo::findOrFail($id);

        // Valida los datos del request
        $validatedData = $request->validate([
            'bibliotecario' => 'sometimes|exists:users,id',
            'solicitante' => 'sometimes|exists:users,id',
            'estado' => 'sometimes|string|max:1',
            'cantidad' => 'sometimes|integer',
            'fecha_prestamo' => 'sometimes|date_format:Y-m-d',
            'fecha_devolucion' => 'sometimes|date_format:Y-m-d',
        ]);

        // Actualiza el préstamo
        $prestamo->update($validatedData);

        return response()->json($prestamo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return response()->noContent();
    }
}
