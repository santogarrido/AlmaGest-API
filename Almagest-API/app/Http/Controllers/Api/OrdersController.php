<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'num' => 'required|string|max:50|unique:orders,num',
            'issuedate' => 'required|date',
            'company_id' => 'required|exists:companies,id',
        ]);

        $order = Order::create([
            'num' => $request->num,
            'issuedate' => $request->issuedate,
            'company_id' => $request->company_id,
            'deleted' => 0,
        ]);

        return response()->json([
            'message' => 'Pedido creado correctamente',
            'order' => $order,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'message' => 'Pedido no encontrada.'
            ], 404);
        }

        return response()->json($order, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
        //
    }
}
