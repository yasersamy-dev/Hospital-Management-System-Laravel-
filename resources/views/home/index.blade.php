@extends('layouts.app')
@section('title')@endsection
@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
</head>

<section class="hero-section position-relative">
    <img src="{{ asset('specialties/trnava-university-_9xRHrMOjeg-unsplash.jpg') }}" class="w-100" style="height:100vh; object-fit:cover;">
    
    <!-- Overlay -->
    <div class="overlay position-absolute top-0 start-0 w-100 h-100" 
         style="background: rgba(0,0,0,0.5);"></div>

    <div class="hero-text position-absolute top-50 start-50 translate-middle text-center text-white">
        <div class="container text-white">
            <h1 class="fw-bold mb-3">مستشفى وكيل</h1>
            <p class="lead mb-4">
                رعاية طبية متكاملة بأفضل الأطباء وأحدث الأجهزة
            </p>

            <a href="#" id="bookNowBtn" class="btn btn-primary btn-lg px-4 me-2">
                احجز موعدك الآن
            </a>

            <a href="#services" class="btn btn-outline-light btn-lg px-4">
                تعرف على خدماتنا
            </a>
        </div>
    </div>
</section>


<!-- قسم الخدمات -->
<div class="container my-5" id="services">
    <h2 class="fw-bold mb-4 text-center">خدمات المستشفى</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="service-box">
                <h5 class="fw-bold mb-2">العيادات الخارجية</h5>
                <p class="text-muted small">أفضل الاستشاريين في جميع التخصصات الطبية.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-box">
                <h5 class="fw-bold mb-2">الطوارئ</h5>
                <p class="text-muted small">خدمة طوارئ على مدار 24 الساعة.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="service-box">
                <h5 class="fw-bold mb-2">المعمل والتحاليل</h5>
                <p class="text-muted small">نتائج دقيقة وسريعة بأحدث الأجهزة.</p>
            </div>
        </div>
    </div>
</div>

<!-- قسم الأطباء -->
<div class="container my-5">
    <h2 class="fw-bold mb-4 text-center">
        افضل أطبائتا</h2>
        <div class="row g-3">
@foreach($topdoctors as $doctor)
    <div class="col-lg-4 col-md-6 col-12">
        <div class="doctor-card text-center">

            @if($doctor->image)
                <img src="{{ asset($doctor->image) }}"
                     class="rounded-circle mb-3"
                     width="120" height="120"
                     style="object-fit:cover;">
            @endif

            <h5 class="fw-bold">{{ $doctor->name }}</h5>

            <small class="text-muted">
                {{ $doctor->title ?? $doctor->specialty->name }}
            </small>

        </div>
    </div>
@endforeach



<!-- إحصائيات -->
<div class="container my-5">
    <div class="row text-center g-4">
        
        <div class="col-md-3">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <h3 class="fw-bold text-primary">{{ $doctorCount }}</h3>
                <p class="text-muted">طبيب متخصص</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <h3 class="fw-bold text-primary">{{ $specialtyCount }}</h3>
                <p class="text-muted">تخصص طبي</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <h3 class="fw-bold text-primary">{{ $patientCount}} </h3>
                <p class="text-muted">مريض حتي الان</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <h3 class="fw-bold text-primary">98%</h3>
                <p class="text-muted">معدل نجاح</p>
            </div>
        </div>

    </div>
</div>

{{-- اراء المرضي --}}
<div class="container my-5">
    <h2 class="fw-bold text-center mb-4">آراء مرضانا</h2>
    <div class="row g-4">

        <div class="col-md-4">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <p>"خدمة ممتازة والدكاترة محترمين جدًا."</p>
                <h6 class="fw-bold mb-0">محمد جمال</h6>
                <small class="text-muted">⭐⭐⭐⭐⭐</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <p>"سرعة في الحجز ونظام قوي."</p>
                <h6 class="fw-bold mb-0">ميار عبد الله</h6>
                <small class="text-muted">⭐⭐⭐⭐⭐</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 bg-white rounded-4 shadow-sm">
                <p>"أفضل مستشفى اتعاملت معها على الإطلاق."</p>
                <h6 class="fw-bold mb-0">أحمد عادل</h6>
                <small class="text-muted">⭐⭐⭐⭐</small>
            </div>
        </div>

    </div>
</div>
{{-- الاسئلة الشائعة --}}
<div class="container my-5">
    <h2 class="fw-bold text-center mb-4">الأسئلة الشائعة</h2>

    <div class="accordion" id="faq">

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#q1">
                    كيف أحجز موعد؟
                </button>
            </h2>
            <div id="q1" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    يمكنك الحجز من خلال الموقع أو الاتصال بنا.
                </div>
            </div>
        </div>

        <div class="accordion-item mt-2">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#q2">
                    هل يوجد تأمين طبي؟
                </button>
            </h2>
            <div id="q2" class="accordion-collapse collapse">
                <div class="accordion-body">
                    نعم، نقبل معظم شركات التأمين.
                </div>
            </div>
        </div>

    </div>
</div>
{{-- صور من داخل المستشفي --}}
<div class="container my-5">
    <h2 class="fw-bold text-center mb-4">صور من داخل المستشفى</h2>
    <div class="row g-3">
        <div class="col-md-4"><img src="{{ asset('specialties/solen-feyissa-Jf5WbV0uVpg-unsplash.jpg') }}" class="img-fluid rounded-3 shadow-sm"></div>
        <div class="col-md-4"><img src="{{ asset('specialties/jonathan-borba-W9YEY6G8LVM-unsplash.jpg') }}" class="img-fluid rounded-3 shadow-sm"></div>
        <div class="col-md-4"><img src="{{ asset('specialties/trnava-university-_9xRHrMOjeg-unsplash.jpg') }}" class="img-fluid rounded-3 shadow-sm"></div>
    </div>
</div>
{{-- تواصل معنا --}}
<div class="container my-5">
    <h2 class="fw-bold text-center mb-4">تواصل معنا</h2>

    <div class="row g-4">

        <div class="col-md-6">
            <div class="bg-white p-4 rounded-4 shadow-sm">
                <h6 class="fw-bold">العنوان</h6>
                <p class="text-muted">المنوفية شبين الكوم</p>

                <h6 class="fw-bold">الهاتف</h6>
                <p class="text-muted">01000000000</p>

                <h6 class="fw-bold">البريد</h6>
                <p class="text-muted">info@wakil-hospital.com</p>
            </div>
        </div>

        <div class="col-md-6">
            <iframe src="https://maps.google.com/maps?q=cairo&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    class="w-100" height="300" style="border:0; border-radius: 15px;"></iframe>
        </div>

    </div>
</div>

@endsection