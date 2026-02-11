@extends('layouts.user')

@section('content')
<div class="container mt-3">
    <h2 class="mb-4">Albaranes</h2>

    @if($deliveryNotes->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            No hay albaranes disponibles en este momento.
        </div>
    @else
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Número de Pedido</th>
                    <th>Número de Albarán</th>
                    <th>Fecha de Emisión</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deliveryNotes as $note)
                    <tr>
                        <td>{{ $note->order->id }}</td>
                        <td>{{ $note->num }}</td>
                        <td>{{ \Carbon\Carbon::parse($note->issuedate)->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
