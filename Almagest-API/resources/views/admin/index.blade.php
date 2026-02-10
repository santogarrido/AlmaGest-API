@extends('layouts.admin')
@vite(['resources/js/app.js'])

@section('content')

<div class="container mt-5">
    <h1 class="mb-4" style="color: rgb(0, 0, 0);">Administration Panel</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Company</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @if ($user->type != 'A')
                    <tr>
                    <td>{{ $user->firstname }}</td>
                    <td> {{ $user->secondname  }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->company->name }}</td>
                    <td class=""actions-cell>
                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            {{-- BOTÓN ACTIVAR (solo si tiene el email confirmado y está desactivado) --}}
                            @if($user->activated == 0)
                                <form action="{{ route('admin.user.activate', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Activate
                                    </button>
                                </form>
                            @endif

                            {{-- BOTÓN DESACTIVAR (solo si está activado) --}}
                            @if($user->activated == 1)
                                <form action="{{ route('admin.user.desactivate', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        Desactivate
                                    </button>
                                </form>
                            @endif

                            {{-- BOTÓN ELIMINAR (siempre visible) --}}
                            <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>

                            {{-- BOTÓN EDITAR (siempre visible) --}}
                            <form action="{{ route('admin.user.edit', $user->id) }}" method="GET" class="d-inline">
                                <button type="submit" class="btn btn-info btn-sm">Edit</button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

{{-- Script de confirmación --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Delete user?',
                    text: 'This action can not be undone',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>

@endsection
