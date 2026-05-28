@extends('layouts.app')

@section('title')
    التخصص — {{ $specialty->name }}
@endsection

@section('content')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/specialty.css') }}">
@endpush


{{-- HERO --}}
<section class="hero-section"
    style="
        background-image:
        url('{{ $specialty->image ? asset($specialty->image) : 'https://via.placeholder.com/1600x700' }}');
    ">

    <div class="hero-overlay"></div>

    <div class="container hero-content">

        <div class="row justify-content-center text-center">

            <div class="col-lg-8">

                <div class="hero-badge">
                    ✨ رعاية طبية متخصصة بأحدث المعايير
                </div>

                <h1 class="hero-title">
                    قسم {{ $specialty->name }}
                </h1>

                <p class="hero-text">
                    {{ $specialty->description ?? 'رعاية طبية متكاملة وفق أعلى المعايير العالمية مع نخبة من الأطباء المتخصصين.' }}
                </p>

                <div class="hero-buttons d-flex justify-content-center gap-3 mt-4 flex-wrap">

                    <a href="#doctors"
                       class="btn btn-primary btn-lg">

                        عرض الأطباء

                    </a>

                    <a href="#about"
                       class="btn btn-outline-light btn-lg">

                        عن القسم

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ABOUT --}}
<section id="about" class="py-5">

    <div class="container">

        <div class="about-box">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    <h2 class="section-title">
                        لماذا تختار قسم {{ $specialty->name }}؟
                    </h2>

                    <p class="text-muted lh-lg mt-4">
                        يقدم القسم خدمات تشخيصية وعلاجية متطورة باستخدام أحدث الأجهزة الطبية والتقنيات الحديثة، مع توفير بيئة علاجية آمنة ومريحة لجميع المرضى.
                    </p>

                    <div class="mt-5">

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="fa-solid fa-user-doctor"></i>
                            </div>

                            <div>
                                <h6 class="fw-bold">
                                    نخبة من الأطباء
                                </h6>

                                <p class="text-muted mb-0">
                                    فريق طبي بخبرة واسعة وكفاءة عالية
                                </p>
                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="fa-solid fa-heart-pulse"></i>
                            </div>

                            <div>
                                <h6 class="fw-bold">
                                    أحدث التقنيات
                                </h6>

                                <p class="text-muted mb-0">
                                    أجهزة وتشخيصات دقيقة وحديثة
                                </p>
                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">
                                <i class="fa-solid fa-notes-medical"></i>
                            </div>

                            <div>
                                <h6 class="fw-bold">
                                    خطط علاج متكاملة
                                </h6>

                                <p class="text-muted mb-0">
                                    متابعة دقيقة وخطط مخصصة لكل مريض
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="row g-4">

                        <div class="col-md-6">

                            <div class="stat-card">

                                <div class="stat-number">
                                    {{ $specialty->doctors->count() ?? 0 }}
                                </div>

                                <p class="text-muted mb-0">
                                    طبيب متخصص
                                </p>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="stat-card">

                                <div class="stat-number">
                                    {{ $specialty->appointments_count ?? '1500+' }}
                                </div>

                                <p class="text-muted mb-0">
                                    مريض حتى الآن
                                </p>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="stat-card">

                                <div class="stat-number">
                                    {{ $specialty->satisfaction_rate ?? '95%' }}
                                </div>

                                <p class="text-muted mb-0">
                                    نسبة رضا المرضى
                                </p>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="stat-card">

                                <div class="stat-number">
                                    {{ $specialty->services_count ?? 10 }}
                                </div>

                                <p class="text-muted mb-0">
                                    خدمة طبية
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- DOCTORS --}}
<section id="doctors" class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title d-inline-block">
                أطباء القسم
            </h2>

        </div>

        <div class="row g-4">

            @forelse($specialty->doctors as $doctor)

                <div class="col-lg-4 col-md-6">

                    <div class="doctor-card h-100">

                        <img src="{{ asset($doctor->image) }}"
                             class="w-100"
                             alt="{{ $doctor->name }}">

                        <div class="doctor-info">

                            <h4 class="doctor-name">
                                {{ $doctor->name }}
                            </h4>

                            <p class="doctor-specialty">
                                {{ $doctor->title ?? $specialty->name }}
                            </p>

                            <div class="doctor-meta">

                                <span>
                                    ⭐ 4.8
                                </span>

                                <span>
                                    👨‍⚕️ +5 سنوات
                                </span>

                                <span>
                                    👥 +1200 مريض
                                </span>

                            </div>

                            <p class="text-muted">
                                {{ Str::limit($doctor->bio, 110) }}
                            </p>

                            <div class="d-flex gap-2 mt-4">

                                <a href="{{ route('doctors.show', $doctor->id) }}"
                                   class="btn btn-outline-primary w-50 rounded-3">

                                    عرض الملف

                                </a>

                                <a href="{{ route('appointments.create', $doctor->id) }}"
                                   class="btn btn-primary w-50 rounded-3">

                                    حجز موعد

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <div class="alert alert-light rounded-4 py-5">

                        لا يوجد أطباء متاحين حالياً

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- FAQ --}}
<section class="py-5">

    <div class="container faq-wrapper">

        <div class="text-center mb-5">

            <h2 class="section-title d-inline-block">
                الأسئلة الشائعة
            </h2>

        </div>

        <div class="accordion" id="faqAccordion">

            @php
                $faqs = $specialty->faqs ?? [
                    ['q' => 'هل يمكن الحجز عبر الموقع؟', 'a' => 'نعم يمكنك الحجز بسهولة من خلال اختيار الطبيب المناسب.'],
                    ['q' => 'هل القسم يعمل طوال الأسبوع؟', 'a' => 'يعمل القسم وفق جدول الأطباء والمواعيد المتاحة.'],
                    ['q' => 'ما مدة الكشف؟', 'a' => 'تختلف حسب الحالة ولكن غالباً بين 15 إلى 30 دقيقة.'],
                ];
            @endphp

            @foreach($faqs as $i => $faq)

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }}"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq{{ $i }}">

                            {{ $faq['q'] }}

                        </button>

                    </h2>

                    <div id="faq{{ $i }}"
                         class="accordion-collapse collapse {{ $i == 0 ? 'show' : '' }}"
                         data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            {{ $faq['a'] }}

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- CTA --}}
<section class="py-5">

    <div class="container">

        <div class="cta-section text-center">

            <h2 class="fw-bold mb-3">
                هل ترغب في حجز موعد بقسم {{ $specialty->name }}؟
            </h2>

            <p class="mb-4 text-white-50">
                اختر الطبيب الأنسب لك واحجز موعدك بسهولة في دقائق
            </p>

            <div class="cta-buttons d-flex justify-content-center gap-3 flex-wrap">

                <a href="#doctors"
                   class="btn btn-light btn-lg">

                    عرض الأطباء

                </a>

                <a href="{{ route('contact.show') }}"
                   class="btn btn-outline-light btn-lg">

                    تواصل معنا

                </a>

            </div>

        </div>

    </div>

</section>

@endsection