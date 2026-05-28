@extends('layouts.app')

@section('title')
    {{ $doctor->name }}
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('css/doctor.css') }}">
@endpush
@section('content')

<div class="container py-5">

    {{-- Hero Section --}}
    <div class="card card-custom doctor-hero p-4 mb-5">
        <div class="row align-items-center">

            <div class="col-lg-3 text-center mb-4 mb-lg-0">
                <img src="{{ asset($doctor->image) }}"
                     class="doctor-image shadow"
                     alt="{{ $doctor->name }}">
            </div>

            <div class="col-lg-6">

                <h2 class="fw-bold mb-2">
                    د / {{ $doctor->name }}
                </h2>

                <h5 class="text-primary mb-3">
                    {{ $doctor->specialty->name ?? 'تخصص غير محدد' }}
                </h5>

                <div class="d-flex flex-wrap gap-3 mb-3">

                    <span class="badge bg-warning text-dark p-2">
                        ⭐ 4.8 تقييم
                    </span>

                    <span class="badge bg-light text-dark p-2">
                        👨‍⚕️ +5 سنوات خبرة
                    </span>

                    <span class="badge bg-light text-dark p-2">
                        👥 +1200 مريض
                    </span>

                </div>

                <p class="text-muted lh-lg">
                    {{ $doctor->bio ?? 'لا توجد نبذة تعريفية متاحة.' }}
                </p>

                <div class="contact-box mt-4">

                    <p>
                        📞 {{ $doctor->phone ?? 'غير متوفر' }}
                    </p>

                    <p>
                        📧 {{ $doctor->email ?? 'غير متوفر' }}
                    </p>

                    <p>
                        📍 {{ $doctor->address ?? 'لا يوجد عنوان متاح' }}
                    </p>

                </div>

            </div>

            <div class="col-lg-3 mt-4 mt-lg-0">

                <div class="card card-custom p-4 sticky-booking">

                    <h5 class="fw-bold mb-3">
                        احجز موعد الآن
                    </h5>

                    <p class="text-muted small">
                        اختر الوقت المناسب واحجز بسهولة
                    </p>

                    <a href="{{ route('appointments.create', $doctor->id) }}"
                       class="btn btn-primary btn-book w-100 mb-3">
                        احجز الآن
                    </a>

                    <button class="btn btn-outline-primary btn-book w-100">
                        ارسال رسالة
                    </button>

                </div>

            </div>

        </div>
    </div>


    {{-- Doctor Info --}}
    <div class="row g-4 mb-5">

        <div class="col-md-3">
            <div class="info-box card-custom">
                <h6>سعر الكشف</h6>
                <strong>200 جنيه</strong>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box card-custom">
                <h6>مدة الانتظار</h6>
                <strong>15 دقيقة</strong>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box card-custom">
                <h6>مدة الجلسة</h6>
                <strong>30 دقيقة</strong>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box card-custom">
                <h6>المرضى</h6>
                <strong>+1200</strong>
            </div>
        </div>

    </div>


    {{-- Working Hours --}}
    <div class="mb-5">

        <h3 class="section-title">
            مواعيد العمل
        </h3>

        <div class="row g-4">

            @foreach($doctor->schedules as $time)

            <div class="col-md-4">

                <div class="schedule-card shadow-sm">

                    <h5 class="fw-bold mb-3">
                        {{ $time->day }}
                    </h5>

                    <p class="text-muted">
                        {{ $time->from }} - {{ $time->to }}
                    </p>

                    <span class="badge bg-success px-3 py-2">
                        متاح
                    </span>

                </div>

            </div>

            @endforeach

        </div>

    </div>


    {{-- Services --}}
    <div class="mb-5">

        <h3 class="section-title">
            الخدمات التي يقدمها
        </h3>

        <div class="service-item shadow-sm">
            <i class="fa-solid fa-stethoscope text-primary fs-4"></i>
            <div>
                <h6 class="fw-bold mb-1">كشف عيادة</h6>
                <small class="text-muted">
                    فحص وتشخيص شامل للحالة
                </small>
            </div>
        </div>

        <div class="service-item shadow-sm">
            <i class="fa-solid fa-heart-pulse text-danger fs-4"></i>
            <div>
                <h6 class="fw-bold mb-1">متابعة الحالات</h6>
                <small class="text-muted">
                    متابعة مستمرة للمرضى
                </small>
            </div>
        </div>

        <div class="service-item shadow-sm">
            <i class="fa-solid fa-user-doctor text-success fs-4"></i>
            <div>
                <h6 class="fw-bold mb-1">استشارات طبية</h6>
                <small class="text-muted">
                    استشارات وحلول طبية احترافية
                </small>
            </div>
        </div>

        <div class="service-item shadow-sm">
            <i class="fa-solid fa-notes-medical text-warning fs-4"></i>
            <div>
                <h6 class="fw-bold mb-1">خطة علاجية</h6>
                <small class="text-muted">
                    إعداد خطة علاج كاملة
                </small>
            </div>
        </div>

    </div>


    {{-- Reviews --}}
    <div class="mb-5">

        <h3 class="section-title">
            آراء المرضى
        </h3>

        <div class="review-box shadow-sm mb-4">

            <div class="d-flex justify-content-between mb-2">
                <h6 class="fw-bold">
                    أحمد محمد
                </h6>

                <span class="text-warning">
                    ⭐⭐⭐⭐⭐
                </span>
            </div>

            <p class="text-muted mb-0">
                دكتور ممتاز جدًا والتعامل محترم والشرح واضح جدًا.
            </p>

        </div>

        <div class="review-box shadow-sm">

            <div class="d-flex justify-content-between mb-2">
                <h6 class="fw-bold">
                    سارة علي
                </h6>

                <span class="text-warning">
                    ⭐⭐⭐⭐⭐
                </span>
            </div>

            <p class="text-muted mb-0">
                تجربة ممتازة جدًا والتنظيم رائع.
            </p>

        </div>

    </div>


    {{-- Map --}}
    <div class="mb-5">

        <h3 class="section-title">
            موقع العيادة
        </h3>

        <div class="card card-custom p-3">

            <p class="text-muted mb-4">
                {{ $doctor->address ?? 'لا يوجد عنوان متاح' }}
            </p>

            @if($doctor->map)

                <div class="rounded-4 overflow-hidden" style="height:400px;">
                    {!! $doctor->map !!}
                </div>

            @endif

        </div>

    </div>


</div>

@endsection