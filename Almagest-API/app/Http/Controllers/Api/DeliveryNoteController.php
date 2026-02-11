<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryNote;

class DeliveryNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deliveryNote = DeliveryNote::find($id);

        if (!$deliveryNote) {
            return response()->json([
                'message' => 'Albarán no encontrado.'
            ], 404);
        }

        // soft delete
        $deliveryNote->deleted = 1;
        $deliveryNote->save();

        return response()->json([
            'message' => 'Albarán eliminado correctamente.'
        ], 200);
    }
}
