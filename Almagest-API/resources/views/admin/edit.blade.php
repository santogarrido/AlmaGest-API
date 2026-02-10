@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center text-white">Edit User</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="card p-4 shadow-sm border-0 form-box">
        @csrf
        <div class="form-group">
            <input type="text" id="firstname" name="firstname" class="form-control" value="{{ old('firstname', $user->firstname) }}" required>
            <label for="firstname">{{ __('First Name') }}</label>
        </div>

        <div class="form-group">
            <input type="text" id="secondname" name="secondname" class="form-control" value="{{ old('secondname', $user->secondname) }}">
            <label for="secondname">{{ __('Second Name') }}</label>
        </div>

        <div class="form-group">
            <select id="company_id" name="company_id" required>
                @foreach(\App\Models\Company::all() as $company)
                    <option
                        value="{{ $company->id }}"
                        {{ old('company_id', $user->company_id) == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
            <label for="company_id">{{ __('Company') }}</label>
            @error('company_id')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Return</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
