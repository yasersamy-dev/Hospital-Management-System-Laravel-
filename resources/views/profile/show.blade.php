@extends('layouts.app')

@section('title', 'الملف الشخصي')

@section('content')

<div class="container py-5">

    @if(session('success'))
        <div class="alert alert-success rounded-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-card mb-5">

        <div class="profile-cover"></div>

        <div class="card-body text-center px-4 pb-5">

            @if(Auth::user()->profile_image && file_exists(public_path(Auth::user()->profile_image)))

                <img src="{{ asset(Auth::user()->profile_image) }}"
                     class="profile-avatar shadow">

            @else

                <div class="bg-white rounded-circle d-inline-flex justify-content-center align-items-center shadow profile-avatar">
                    <i class="bi bi-person-fill text-secondary"
                       style="font-size:70px"></i>
                </div>

            @endif

            <h2 class="fw-bold mt-3">
                {{ Auth::user()->name }}
            </h2>

            <p class="text-muted mb-1">
                {{ Auth::user()->email }}
            </p>

            <span class="badge bg-primary px-4 py-2 rounded-pill">
                {{ Auth::user()->role }}
            </span>

            <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">

                <a href="{{ route('profile.edit') }}"
                   class="btn btn-warning btn-modern">
                    <i class="bi bi-pencil-square me-1"></i>
                    تعديل الحساب
                </a>

                <a href="{{ route('appointments.show') }}"
                   class="btn btn-outline-primary btn-modern">
                    <i class="bi bi-calendar-check me-1"></i>
                    حجوزاتي
                </a>

            </div>

        </div>

    </div>

    <div class="row g-4">

        <div class="col-md-6">

            <div class="card info-card h-100">

                <div class="card-body">

                    <h5 class="fw-bold mb-4 text-primary">
                        <i class="bi bi-person-vcard me-2"></i>
                        المعلومات الشخصية
                    </h5>

                    <div class="mb-3">
                        <small class="text-muted d-block">
                            رقم الهاتف
                        </small>

                        <strong>
                            {{ Auth::user()->phone ?? 'غير متوفر' }}
                        </strong>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">
                            العنوان
                        </small>

                        <strong>
                            {{ Auth::user()->address ?? 'غير متوفر' }}
                        </strong>
                    </div>

                    <div>
                        <small class="text-muted d-block">
                            تاريخ إنشاء الحساب
                        </small>

                        <strong>
                            {{ Auth::user()->created_at->format('Y-m-d') }}
                        </strong>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection