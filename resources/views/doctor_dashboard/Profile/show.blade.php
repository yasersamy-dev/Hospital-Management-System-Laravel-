@extends('layouts.doctor-dashboard')

@section('title', 'الملف الشخصي')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/doctor_dashboard/showProfile.css') }}">
    
@endpush

@section('content')

<div class="doctor-profile-page">

    <!-- HERO -->

    <div class="profile-hero">

        <div class="profile-cover"></div>

        <div class="profile-content">

            <!-- IMAGE -->

            <div class="profile-image-wrapper">

                <img src="{{ asset($doctor->image ?? 'default-doctor.jpg') }}"
                     alt="Doctor Image"
                     class="profile-image">

                <a href="#"
                   class="edit-image-btn">

                    <i class="bi bi-camera"></i>

                </a>

            </div>

            <!-- INFO -->

            <div class="profile-main-info">

                <div>

                    <h2>
                        د /
                        {{ $doctor->name }}
                    </h2>

                    <p class="specialty">
                        {{ $doctor->specialty?->name ?? 'لا يوجد تخصص' }}
                    </p>

                </div>

                <span class="doctor-status">
                    <span class="status-dot"></span>
                    متصل الآن
                </span>

            </div>

            <!-- ACTIONS -->

            <div class="profile-actions">

                <a href="{{ route('doctor.profile.edit') }}"
                   class="btn btn-primary custom-btn">

                    <i class="bi bi-pencil-square"></i>
                    تعديل البيانات

                </a>

                <a href="#"
                   class="btn btn-light custom-btn">

                    <i class="bi bi-share"></i>
                    مشاركة الملف

                </a>

            </div>

        </div>

    </div>

    <!-- STATS -->

    <div class="profile-stats">

        <div class="stat-card">

            <div class="stat-icon blue">
                <i class="bi bi-calendar2-check"></i>
            </div>

            <div>

                <h3>
                    {{ $appointments->count() }}
                </h3>

                <p>
                    إجمالي الحجوزات
                </p>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon green">
                <i class="bi bi-check-circle"></i>
            </div>

            <div>

                <h3>
                    {{ $completedAppointments }}
                </h3>

                <p>
                    كشف مكتمل
                </p>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon orange">
                <i class="bi bi-star-fill"></i>
            </div>

            <div>

                <h3>
                    4.9
                </h3>

                <p>
                    التقييم
                </p>

            </div>

        </div>

        

    </div>

    <!-- CONTENT -->

    <div class="profile-grid">

        <!-- LEFT -->

        <div class="profile-left">

            <!-- ABOUT -->

            <div class="profile-card">

                <div class="card-header-custom">

                    <h4>
                        <i class="bi bi-person-vcard"></i>
                        نبذة عن الطبيب
                    </h4>

                </div>

                <p class="bio-text">

                    {{ $doctor->bio ?? 'لا يوجد نبذة حالياً' }}

                </p>

            </div>

            <!-- EXPERIENCE -->

            <div class="profile-card">

                <div class="card-header-custom">

                    <h4>
                        <i class="bi bi-award"></i>
                        معلومات إضافية
                    </h4>

                </div>

                <div class="info-grid">

                    <div class="info-item">

                        <span>
                            رقم الهاتف
                        </span>

                        <strong>
                            {{ $doctor->phone ?? 'غير متوفر' }}
                        </strong>

                    </div>

                    <div class="info-item">

                        <span>
                            العنوان
                        </span>

                        <strong>
                            {{ $doctor->address ?? 'غير متوفر' }}
                        </strong>

                    </div>

                    <div class="info-item">

                        <span>
                            التخصص
                        </span>

                        <strong>
                            {{ $doctor->specialty?->name ?? 'غير محدد' }}
                        </strong>

                    </div>

                    <div class="info-item">

                        <span>
                            البريد الإلكتروني
                        </span>

                        <strong>
                            {{ auth()->user()->email }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->

        <div class="profile-right">

            <!-- QUICK ACTIONS -->

            <div class="profile-card">

                <div class="card-header-custom">

                    <h4>
                        <i class="bi bi-lightning-charge"></i>
                        إجراءات سريعة
                    </h4>

                </div>

                <div class="quick-actions">

                    <a href="#"
                       class="quick-btn">

                        <i class="bi bi-calendar-plus"></i>

                        <span>
                            إضافة موعد
                        </span>

                    </a>

                    <a href="{{ route('chat.index')}}"
                       class="quick-btn">

                        <i class="bi bi-chat-dots"></i>

                        <span>
                            الرسائل
                        </span>

                    </a>

                    <a href="{{ route('doctor.notifications.index') }}"
                       class="quick-btn">

                        <i class="bi bi-bell"></i>

                        <span>
                            الإشعارات
                        </span>

                    </a>

                    <a href="#"
                       class="quick-btn">

                        <i class="bi bi-gear"></i>

                        <span>
                            الإعدادات
                        </span>

                    </a>

                </div>

            </div>

            

    </div>

</div>



@endsection