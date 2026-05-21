@extends('adminlte::page')

@section('title', 'إضافة دكتور')

@section('content_header')
    <h1>إضافة دكتور جديد</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">بيانات الدكتور</h3>
            </div>

            <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                 
                    <div class="form-group">
                        <label>اسم الدكتور</label>
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}"
                               placeholder="ادخل اسم الدكتور">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label>رقم الهاتف</label>
                        <input type="text"
                               name="phone"
                               class="form-control @error('phone') is-invalid @enderror"
                               value="{{ old('phone') }}"
                               placeholder="01xxxxxxxxx">
                        @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label>التخصص</label>
                        <select name="specialty_id"
                                class="form-control @error('specialty_id') is-invalid @enderror">
                            <option value="">-- اختر التخصص --</option>
                            @foreach($specialties as $specialty)
                                <option value="{{ $specialty->id }}"
                                    {{ old('specialty_id') == $specialty->id ? 'selected' : '' }}>
                                    {{ $specialty->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('specialty_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                   <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> حفظ
                    </button>

                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        رجوع
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@stop
