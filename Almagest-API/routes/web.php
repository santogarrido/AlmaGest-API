<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeliveryNoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //ADMIN (Antiguo)
    Route::get('/home', function () {
        if (Auth::check() && Auth::user()->type === 'A') {
            return app(AdminController::class)->index();
        } else {
            return app(HomeController::class)->index();
        }
    })->middleware('auth');

    Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('auth')
        ->name('admin.index');

    Route::post('/admin/user/{id}/activate', [AdminController::class, 'activate'])
        ->middleware('auth')
        ->name('admin.user.activate');

    Route::post('/admin/user/{id}/desactivate', [AdminController::class, 'desactivate'])
        ->middleware('auth')
        ->name('admin.user.desactivate');

    Route::post('/admin/user/{id}/delete', [AdminController::class, 'delete'])
        ->middleware('auth')
        ->name('admin.user.delete');

    Route::get('/admin/user/{id}/edit', [AdminController::class, 'edit'])
        ->middleware('auth')
        ->name('admin.user.edit');

    Route::post('/admin/user/{id}/update', [AdminController::class, 'update'])
        ->middleware('auth')
        ->name('admin.user.update');


    //Delivery Note
    Route::resource('deliverynotes', DeliveryNoteController::class)->only(['index']);

    //Order
    Route::resource('orders', OrdersController::class)->only(['index']);

    //Facturas
    Route::resource('invoices', InvoiceController::class)->only(['index']);
});
