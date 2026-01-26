@extends('adminlte::page')

@section('title', 'تعديل طبيب')

@section('content_header')
    <h1>تعديل طبيب</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('doctors.update', $doctor->id) }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>اسم الطبيب</label>
                <input type="text" name="name"
                       value="{{ old('name', $doctor->name) }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>التخصص</label>
                <select name="specialty_id" class="form-control">
                    @foreach($specialties as $specialty)
                        <option value="{{ $specialty->id }}"
                            {{ $doctor->specialty_id == $specialty->id ? 'selected' : '' }}>
                            {{ $specialty->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>رقم الهاتف</label>
                <input type="text" name="phone"
                       value="{{ old('phone', $doctor->phone) }}"
                       class="form-control">
            </div>

            <div class="form-group">
                <label>الوصف</label>
                <textarea name="bio" rows="4"
                          class="form-control">{{ old('bio', $doctor->bio) }}</textarea>
            </div>

            <div class="form-group">
                <label>الحالة</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $doctor->status ? 'selected' : '' }}>مفعل</option>
                    <option value="0" {{ !$doctor->status ? 'selected' : '' }}>موقوف</option>
                </select>
            </div>

            <button class="btn btn-success">
                <i class="fas fa-save"></i> حفظ التعديلات
            </button>

            <a href="{{ route('doctors.index') }}" class="btn btn-secondary">رجوع</a>
        </form>
    </div>
</div>
@stop
