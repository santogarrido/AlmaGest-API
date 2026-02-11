<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
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
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json([
                'message' => 'Factura no encontrada.'
            ], 404);
        }

        return response()->json($invoice, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json([
                'message' => 'Factura no encontrada.'
            ], 404);
        }

        // Validar
        $data = $request->validate([
            'issuedate' => 'sometimes|date',
            'delivery_note_id' => 'sometimes|exists:delivery_note,id',
            'deleted' => 'sometimes|boolean'
        ]);

        $invoice->update($data);

        return response()->json([
            'message' => 'Factura actualizada correctamente.',
            'invoice' => $invoice
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json([
                'message' => 'Factura no encontrada.'
            ], 404);
        }

        // soft delete
        $invoice->deleted = 1;
        $invoice->save();

        return response()->json([
            'message' => 'Factura eliminada correctamente.'
        ], 200);
    }
}
