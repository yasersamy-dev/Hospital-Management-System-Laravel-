@extends('adminlte::page')

@section('title', 'إضافة تخصص')

@section('content_header')
    <h1>إضافة تخصص جديد</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('specialties.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>اسم التخصص</label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
                       placeholder="اكتب اسم التخصص">

                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-3">
                <button class="btn btn-success">
                    <i class="fas fa-save"></i> حفظ
                </button>

                <a href="{{ route('specialties.index') }}" class="btn btn-secondary">
                    رجوع
                </a>
            </div>
        </form>
    </div>
</div>
@stop
