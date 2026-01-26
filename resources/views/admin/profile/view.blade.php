@extends('adminlte::page')

@section('title', 'الملف الشخصي')

@section('content_header')
    <h1>الملف الشخصي</h1>
@stop

@section('content')
<div class="row">
    {{-- الكارت الجانبي --}}
    <div class="col-md-4">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile text-center">

                <img class="profile-user-img img-fluid img-circle"
                     src="{{ auth()->user()->profile_image
                            ? asset('speciailtes/' . auth()->user()->profile_image) 
                            : asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}"
                     alt="User profile picture">

                <h3 class="profile-username mt-3">
                    {{ auth()->user()->name }}
                </h3>

                <p class="text-muted">
                    {{ auth()->user()->email }}
                </p>

                <span class="badge badge-success">
                    نشط
                </span>

            </div>
        </div>
    </div>

    {{-- فورم التعديل --}}
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">تعديل البيانات الشخصية</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>الاسم</label>
                        <input type="text"
                               name="name"
                               value="{{ old('name', auth()->user()->name) }}"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email', auth()->user()->email) }}"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>صورة البروفايل</label>
                        <input type="file"
                               name="image"
                               class="form-control-file @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <hr>

                    <div class="form-group">
                        <label>كلمة المرور الجديدة</label>
                        <input type="password"
                               name="password"
                               class="form-control">
                        <small class="text-muted">
                            اتركها فارغة لو مش عايز تغيرها
                        </small>
                    </div>

                    <div class="form-group">
                        <label>تأكيد كلمة المرور</label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control">
                    </div>

                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> حفظ التعديلات
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

