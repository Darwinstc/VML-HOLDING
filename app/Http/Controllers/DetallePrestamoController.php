<?php

namespace App\Http\Controllers;

use App\Models\DetallePrestamo;
use Illuminate\Http\Request;

class DetallePrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($idPrestamo)
    {
        $detallePrestamo = DetallePrestamo::where('prestamo_id', $idPrestamo)
                          ->with('prestamo', 'libro')
                          ->get();

        return response()->json($detallePrestamo,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prestamo_id' => 'required|exists:prestamo,id',
            'libro_id' => 'required|exists:libro,id',
            'cantidad' => 'required|integer',
            'estado' => 'required|string|max:1',
            'estado_entrega' => 'required|string|max:1',
            'estado_devolucion' => 'required|string|max:1',
            'fecha_devolucion' => 'required|date_format:Y-m-d',
        ]);

        $detallePrestamo = DetallePrestamo::create($validatedData);

        return response()->json($detallePrestamo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $detallePrestamo = DetallePrestamo::with('prestamo', 'libro')->findOrFail($id);

        return response()->json($detallePrestamo);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $detallePrestamo = DetallePrestamo::findOrFail($id);

        $validatedData = $request->validate([
            'prestamo_id' => 'sometimes|exists:prestamo,id',
            'libro_id' => 'sometimes|exists:libro,id',
            'cantidad' => 'sometimes|integer',
            'estado' => 'sometimes|string|max:1',
            'estado_entrega' => 'sometimes|string|max:1',
            'estado_devolucion' => 'sometimes|string|max:1',
            'fecha_devolucion' => 'sometimes|date_format:Y-m-d',
        ]);

        $detallePrestamo->update($validatedData);

        return response()->json($detallePrestamo);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detallePrestamo = DetallePrestamo::findOrFail($id);
        $detallePrestamo->delete();

        return response()->noContent();
    }
}
