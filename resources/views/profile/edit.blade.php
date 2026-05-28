@extends('layouts.app')

@section('title', 'تعديل الملف الشخصي')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/showprofile.css')}}">
@endpush

@section('content')

<div class="container py-5">

    <div class="edit-profile-wrapper">

        <!-- HEADER -->
        <div class="edit-header">

            <div class="header-overlay"></div>

            <div class="header-content">

                @if(Auth::user()->profile_image && file_exists(public_path(Auth::user()->profile_image)))

                    <img src="{{ asset(Auth::user()->profile_image) }}"
                         class="edit-avatar">

                @else

                    <div class="default-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                @endif

                <h2 class="fw-bold mt-3">
                    تعديل الملف الشخصي
                </h2>

                <p class="text-light opacity-75">
                    يمكنك تعديل بيانات حسابك بسهولة
                </p>

            </div>

        </div>

        <!-- CARD -->
        <div class="edit-card">

            @if(session('success'))

                <div class="alert alert-success custom-alert">
                    {{ session('success') }}
                </div>

            @endif

            <form action="{{ route('profile.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- NAME -->
                    <div class="col-md-6">

                        <label class="form-label custom-label">
                            <i class="bi bi-person"></i>
                            الاسم
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control modern-input"
                               value="{{ old('name', Auth::user()->name) }}">

                        @error('name')

                            <div class="text-danger mt-2 small">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <!-- EMAIL -->
                    <div class="col-md-6">

                        <label class="form-label custom-label">
                            <i class="bi bi-envelope"></i>
                            البريد الإلكتروني
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control modern-input"
                               value="{{ old('email', Auth::user()->email) }}">

                        @error('email')

                            <div class="text-danger mt-2 small">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <!-- PHONE -->
                    <div class="col-md-6">

                        <label class="form-label custom-label">
                            <i class="bi bi-phone"></i>
                            رقم الهاتف
                        </label>

                        <input type="text"
                               name="phone"
                               class="form-control modern-input"
                               value="{{ old('phone', Auth::user()->phone) }}">

                        @error('phone')

                            <div class="text-danger mt-2 small">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <!-- ADDRESS -->
                    <div class="col-md-6">

                        <label class="form-label custom-label">
                            <i class="bi bi-geo-alt"></i>
                            العنوان
                        </label>

                        <input type="text"
                               name="address"
                               class="form-control modern-input"
                               value="{{ old('address', Auth::user()->address) }}">

                        @error('address')

                            <div class="text-danger mt-2 small">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <!-- IMAGE -->
                    <div class="col-12">

                        <label class="form-label custom-label">
                            <i class="bi bi-image"></i>
                            صورة الملف الشخصي
                        </label>

                        <input type="file"
                               name="profile_image"
                               class="form-control modern-input"
                               accept="image/*">

                        @error('profile_image')

                            <div class="text-danger mt-2 small">
                                {{ $message }}
                            </div>

                        @enderror

                        @if(Auth::user()->profile_image && file_exists(public_path(Auth::user()->profile_image)))

                            <div class="image-preview">

                                <img src="{{ asset(Auth::user()->profile_image) }}"
                                     class="preview-img">

                            </div>

                        @endif

                    </div>

                </div>

                <!-- BUTTONS -->
                <div class="action-buttons">

                    <button type="submit"
                            class="btn save-btn">

                        <i class="bi bi-check-circle"></i>
                        حفظ التعديلات

                    </button>

                    <a href="{{ route('profile.show') }}"
                       class="btn cancel-btn">

                        <i class="bi bi-arrow-right"></i>
                        رجوع

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection