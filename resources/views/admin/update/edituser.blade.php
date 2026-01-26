@extends('adminlte::page')

@section('title', 'تعديل مستخدم')

@section('content_header')
    <h1>تعديل مستخدم</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>الاسم</label>
                <input type="text" name="name"
                       value="{{ old('name', $user->name) }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>البريد الإلكتروني</label>
                <input type="email" name="email"
                       value="{{ old('email', $user->email) }}"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>كلمة المرور (اختياري)</label>
                <input type="password" name="password" class="form-control">
                <small class="text-muted">اتركها فارغة لو مش عايز تغيرها</small>
            </div>

            <div class="form-group">
                <label>الحالة</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $user->status ? 'selected' : '' }}>نشط</option>
                    <option value="0" {{ !$user->status ? 'selected' : '' }}>موقوف</option>
                </select>
            </div>

            <button class="btn btn-primary">
                <i class="fas fa-save"></i> تحديث
            </button>

            <a href="{{ route('users.index') }}" class="btn btn-secondary">رجوع</a>
        </form>
    </div>
</div>
@stop
