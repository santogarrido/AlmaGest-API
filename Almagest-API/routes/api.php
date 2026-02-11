<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrdersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeliveryNoteController;
use App\Http\Controllers\Api\InvoiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Login y register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas autenticadas API
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    //Delivery Notes API
    Route::apiResource('deliverynotes', DeliveryNoteController::class);
    //Ruta personalizada de sign
    //Route::post('deliverynotes/sign/{deliverynote}', [DeliveryNoteController::class, 'sign']);

    //Invoices API
    Route::apiResource('invoices', InvoiceController::class);

    //Orders API
    Route::apiResource('orders', OrdersController::class);

});
