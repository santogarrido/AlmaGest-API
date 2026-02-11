@extends('layouts.user')

@section('content')
<div class="container mt-3">
    <h2 class="mb-4">Pedidos</h2>

    @if($orders->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            No hay pedidos disponibles en este momento.
        </div>
    @else
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Número de Pedido</th>
                    <th>Compañía</th>
                    <th>Fecha de Emisión</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->num }}</td>
                        <td>{{ $order->company->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->issuedate)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
