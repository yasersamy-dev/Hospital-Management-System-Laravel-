@extends('layouts.app')

@section('title', 'الملف الشخصي')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/showprofile.css')}}">
@endpush

@section('content')

<div class="container py-5">

    @if(session('success'))
        <div class="alert alert-success rounded-4 shadow-sm border-0">
            {{ session('success') }}
        </div>
    @endif

    <!-- PROFILE HERO -->
    <div class="profile-wrapper mb-5">

        <div class="profile-cover"></div>

        <div class="profile-content text-center">

            {{-- IMAGE --}}
            @if(Auth::user()->profile_image && file_exists(public_path(Auth::user()->profile_image)))

                <img src="{{ asset(Auth::user()->profile_image) }}"
                     class="profile-avatar">

            @else

                <div class="default-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>

            @endif

            {{-- USER INFO --}}
            <h2 class="fw-bold mt-4 mb-1">
                {{ Auth::user()->name }}
            </h2>

            <p class="text-muted mb-3">
                {{ Auth::user()->email }}
            </p>

            <span class="badge-role">
                {{ Auth::user()->role }}
            </span>

            {{-- ACTIONS --}}
            <div class="profile-actions mt-4">

                <a href="{{ route('profile.edit') }}"
                   class="btn btn-warning custom-btn">

                    <i class="bi bi-pencil-square"></i>
                    تعديل الحساب

                </a>

                <a href="{{ route('appointments.show') }}"
                   class="btn btn-outline-primary custom-btn">

                    <i class="bi bi-calendar-check"></i>
                    حجوزاتي

                </a>

            </div>

        </div>

    </div>

    <!-- INFO CARDS -->
    <div class="row g-4">

        <!-- PERSONAL INFO -->
        <div class="col-lg-6">

            <div class="modern-card h-100">

                <div class="card-title-modern">
                    <i class="bi bi-person-vcard"></i>
                    المعلومات الشخصية
                </div>

                <div class="info-item">
                    <span>رقم الهاتف</span>

                    <strong>
                        {{ Auth::user()->phone ?? 'غير متوفر' }}
                    </strong>
                </div>

                <div class="info-item">
                    <span>العنوان</span>

                    <strong>
                        {{ Auth::user()->address ?? 'غير متوفر' }}
                    </strong>
                </div>

                <div class="info-item border-0 pb-0">
                    <span>تاريخ إنشاء الحساب</span>

                    <strong>
                        {{ Auth::user()->created_at->format('Y-m-d') }}
                    </strong>
                </div>

            </div>

        </div>

        <!-- QUICK STATS -->
        <div class="col-lg-6">

            <div class="modern-card h-100">

                <div class="card-title-modern">
                    <i class="bi bi-bar-chart-line"></i>
                    إحصائيات سريعة
                </div>

                <div class="stats-grid">

                    <div class="stat-box">
                        <h3>
                            {{ Auth::user()->appointments->count() ?? 0 }}
                        </h3>

                        <p>الحجوزات</p>
                    </div>

                    <div class="stat-box">
                        <h3>
                            {{ Auth::user()->created_at->diffForHumans() }}
                        </h3>

                        <p>مدة الاستخدام</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection