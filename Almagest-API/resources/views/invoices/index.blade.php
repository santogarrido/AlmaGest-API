@extends('layouts.user')

@section('content')
<div class="container mt-3">
    <h2 class="mb-4">Facturas</h2>

    @if($invoices->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            No hay facturas disponibles en este momento.
        </div>
    @else
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Número de factura</th>
                    <th>Número de Albarán</th>
                    <th>Fecha de Emisión</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->num }}</td>
                        <td>{{ $invoice->deliveryNote->num }}</td>
                        <td>{{ \Carbon\Carbon::parse($invoice->issuedate)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
