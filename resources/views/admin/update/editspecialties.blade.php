@extends('adminlte::page')

@section('title', 'تعديل تخصص')

@section('content_header')
    <h1>تعديل تخصص</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('specialties.update', $specialty->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>اسم التخصص</label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $specialty->name) }}">

                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-3">
                <button class="btn btn-primary">
                    <i class="fas fa-edit"></i> تحديث
                </button>

                <a href="{{ route('specialties.index') }}" class="btn btn-secondary">
                    رجوع
                </a>
            </div>
        </form>
    </div>
</div>
@stop
