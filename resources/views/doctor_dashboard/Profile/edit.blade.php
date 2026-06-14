@extends('layouts.doctor-dashboard')

@section('title', 'تعديل الملف الشخصي')

@section('content')



    <div class="dashboard-card">

        <h3 class="mb-4 fw-bold">
            تعديل الملف الشخصي
        </h3>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('doctor.profile.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row g-4">

               <div class="row g-4">

    <!-- NAME -->
    <div class="col-md-6">
        <label class="form-label">الاسم</label>

        <input type="text"
               name="name"
               value="{{ old('name', $doctor->name) }}"
               class="form-control">

        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- EMAIL -->
    <div class="col-md-6">
        <label class="form-label">البريد الإلكتروني</label>

        <input type="email"
               name="email"
               value="{{ old('email', auth()->user()->email) }}"
               class="form-control">

        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- PHONE -->
    <div class="col-md-6">
        <label class="form-label">الهاتف</label>

        <input type="text"
               name="phone"
               value="{{ old('phone', auth()->user()->phone) }}"
               class="form-control">
    </div>

    <!-- ADDRESS -->
    <div class="col-md-6">
        <label class="form-label">العنوان</label>

        <input type="text"
               name="address"
               value="{{ old('address', auth()->user()->address) }}"
               class="form-control">
    </div>

    <!-- IMAGE -->
    <div class="col-md-6">
        <label class="form-label">الصورة</label>

        <input type="file"
               name="image"
               class="form-control">

        @if($doctor->image)
            <div class="mt-3">
                <img src="{{ asset($doctor->image) }}"
                     width="100"
                     class="rounded-circle shadow">
            </div>
        @endif
    </div>

    <!-- BIO -->
    <div class="col-12">
        <label class="form-label">نبذة</label>

        <textarea name="bio"
                  rows="4"
                  class="form-control">{{ old('bio', $doctor->bio) }}</textarea>
    </div>

    </div>
                

            <!-- BUTTONS -->
            <div class="mt-4 d-flex gap-2">

                <button class="btn btn-primary px-4">
                    حفظ التعديلات
                </button>

                <a href="{{ route('doctor.profile') }}"
                   class="btn btn-light px-4">
                    رجوع
                </a>

            </div>

        </form>

    </div>


@endsection