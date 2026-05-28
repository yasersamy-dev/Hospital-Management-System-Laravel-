@extends('layouts.app')

@section('title', 'مستشفى وكيل')

@push('style')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush

@section('content')

<!-- HERO -->
<section class="hero-section position-relative overflow-hidden">

    <img src="{{ asset('specialties/trnava-university-_9xRHrMOjeg-unsplash.jpg') }}"
         class="hero-image w-100 h-100 object-fit-cover">

    <div class="hero-overlay"></div>

    <!-- Animated Shapes -->
    <div class="hero-shape shape-1"></div>
    <div class="hero-shape shape-2"></div>

    <div class="hero-content container position-relative z-3">
        <div class="row align-items-center min-vh-100">

            <div class="col-lg-7 text-white">

                <span class="hero-badge">
                    أفضل رعاية صحية متكاملة
                </span>

                <h1 class="hero-title mt-4">
                    مستشفى وكيل الطبية
                </h1>

                <p class="hero-description">
                    نقدم أفضل الخدمات الطبية بأحدث الأجهزة
                    وبأفضل الأطباء المتخصصين لضمان راحتك
                    وصحتك على مدار الساعة.
                </p>

                <div class="hero-buttons d-flex flex-wrap gap-3 mt-4">

                    <a href="#services" class="btn hero-btn-primary">
                        احجز موعد الآن
                    </a>

                    <a href="#doctors" class="btn hero-btn-outline">
                        تصفح الأطباء
                    </a>

                </div>

            </div>

        </div>
    </div>

    <!-- Scroll Down -->
    <a href="#services" class="scroll-down">
        <span></span>
    </a>

</section>

<!-- SERVICES -->
<section class="section-space" id="services">

    <div class="container">

        <div class="section-header text-center reveal">
            <span class="section-subtitle">خدماتنا</span>
            <h2 class="section-title">الخدمات الطبية</h2>
            <p class="section-description">
                نقدم مجموعة متكاملة من الخدمات الطبية بأعلى جودة
            </p>
        </div>

        <div class="row g-4 mt-3">

            <div class="col-lg-4 col-md-6 reveal">
                <div class="service-card h-100">

                    <div class="service-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>

                    <h4>العيادات الخارجية</h4>

                    <p>
                        نخبة من أفضل الأطباء والاستشاريين
                        في جميع التخصصات الطبية.
                    </p>

                </div>
            </div>

            <div class="col-lg-4 col-md-6 reveal">
                <div class="service-card h-100">

                    <div class="service-icon">
                        <i class="fa-solid fa-truck-medical"></i>
                    </div>

                    <h4>الطوارئ</h4>

                    <p>
                        خدمة طوارئ متوفرة 24 ساعة
                        بأحدث الإمكانيات الطبية.
                    </p>

                </div>
            </div>

            <div class="col-lg-4 col-md-6 reveal">
                <div class="service-card h-100">

                    <div class="service-icon">
                        <i class="fa-solid fa-flask-vial"></i>
                    </div>

                    <h4>المعامل والتحاليل</h4>

                    <p>
                        أحدث أجهزة التحاليل لضمان
                        نتائج دقيقة وسريعة.
                    </p>

                </div>
            </div>

        </div>

    </div>

</section>

<!-- TOP DOCTORS -->
<section class="section-space doctors-section" id="doctors">

    <div class="container">

        <div class="section-header text-center reveal">
            <span class="section-subtitle">الأطباء</span>
            <h2 class="section-title">أفضل أطبائنا</h2>
        </div>

        <div class="row g-4 mt-3">

            @foreach($topdoctors as $doctor)

            <div class="col-lg-4 col-md-6 reveal">

                <div class="doctor-card text-center h-100">

                    <div class="doctor-image-wrapper">

                        @if($doctor->image)
                            <img src="{{ asset($doctor->image) }}"
                                 class="doctor-image">
                        @endif

                    </div>

                    <h5 class="doctor-name">
                        {{ $doctor->name }}
                    </h5>

                    <p class="doctor-specialty">
                        {{ $doctor->title ?? $doctor->specialty->name }}
                    </p>

                    <a href="#" class="doctor-btn">
                        عرض الملف الشخصي
                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

<!-- STATS -->
<section class="stats-section section-space">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-3 col-md-6 reveal">
                <div class="stats-card">

                    <h3>{{ $doctorCount }}+</h3>
                    <p>طبيب متخصص</p>

                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="stats-card">

                    <h3>{{ $specialtyCount }}+</h3>
                    <p>تخصص طبي</p>

                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="stats-card">

                    <h3>{{ $patientCount }}+</h3>
                    <p>مريض حتى الآن</p>

                </div>
            </div>

            <div class="col-lg-3 col-md-6 reveal">
                <div class="stats-card">

                    <h3>98%</h3>
                    <p>معدل نجاح</p>

                </div>
            </div>

        </div>

    </div>

</section>

<!-- TESTIMONIALS -->
<section class="section-space">

    <div class="container">

        <div class="section-header text-center reveal">
            <span class="section-subtitle">آراء العملاء</span>
            <h2 class="section-title">ماذا يقول مرضانا</h2>
        </div>

        <div class="row g-4 mt-4">

            <div class="col-lg-4 reveal">
                <div class="testimonial-card">

                    <div class="stars">★★★★★</div>

                    <p>
                        خدمة ممتازة والدكاترة محترمين جدًا
                        والتنظيم رائع جدًا.
                    </p>

                    <h6>محمد جمال</h6>

                </div>
            </div>

            <div class="col-lg-4 reveal">
                <div class="testimonial-card">

                    <div class="stars">★★★★★</div>

                    <p>
                        سرعة في الحجز ونظام احترافي
                        واهتمام كبير بالمريض.
                    </p>

                    <h6>ميار عبد الله</h6>

                </div>
            </div>

            <div class="col-lg-4 reveal">
                <div class="testimonial-card">

                    <div class="stars">★★★★☆</div>

                    <p>
                        أفضل مستشفى تعاملت معها
                        من حيث النظافة والخدمة.
                    </p>

                    <h6>أحمد عادل</h6>

                </div>
            </div>

        </div>

    </div>

</section>

<!-- FAQ -->
<section class="section-space faq-section">

    <div class="container">

        <div class="section-header text-center reveal">
            <span class="section-subtitle">FAQ</span>
            <h2 class="section-title">الأسئلة الشائعة</h2>
        </div>

        <div class="accordion custom-accordion reveal mt-5" id="faqAccordion">

            <div class="accordion-item">
                <h2 class="accordion-header">

                    <button class="accordion-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq1">

                        كيف أحجز موعد؟

                    </button>

                </h2>

                <div id="faq1"
                     class="accordion-collapse collapse show">

                    <div class="accordion-body">
                        يمكنك الحجز بسهولة من خلال الموقع أو الاتصال بنا.
                    </div>

                </div>
            </div>

            <div class="accordion-item mt-3">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq2">

                        هل يوجد تأمين طبي؟

                    </button>

                </h2>

                <div id="faq2"
                     class="accordion-collapse collapse">

                    <div class="accordion-body">
                        نعم، نقبل معظم شركات التأمين الطبي.
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- GALLERY -->
<section class="section-space">

    <div class="container">

        <div class="section-header text-center reveal">
            <span class="section-subtitle">المعرض</span>
            <h2 class="section-title">صور من داخل المستشفى</h2>
        </div>

        <div class="row g-4 mt-3">

            <div class="col-lg-4 col-md-6 reveal">
                <div class="gallery-card">
                    <img src="{{ asset('specialties/solen-feyissa-Jf5WbV0uVpg-unsplash.jpg') }}"
                         class="gallery-image">
                </div>
            </div>

            <div class="col-lg-4 col-md-6 reveal">
                <div class="gallery-card">
                    <img src="{{ asset('specialties/jonathan-borba-W9YEY6G8LVM-unsplash.jpg') }}"
                         class="gallery-image">
                </div>
            </div>

            <div class="col-lg-4 col-md-6 reveal">
                <div class="gallery-card">
                    <img src="{{ asset('specialties/trnava-university-_9xRHrMOjeg-unsplash.jpg') }}"
                         class="gallery-image">
                </div>
            </div>

        </div>

    </div>

</section>

<!-- CONTACT -->
<section class="section-space contact-section">

    <div class="container">

        <div class="section-header text-center reveal">
            <span class="section-subtitle">تواصل معنا</span>
            <h2 class="section-title">نحن هنا لخدمتك</h2>
        </div>

        <div class="row g-4 mt-4">

            <div class="col-lg-5 reveal">

                <div class="contact-card">

                    <div class="contact-item">
                        <h6>العنوان</h6>
                        <p>المنوفية - شبين الكوم</p>
                    </div>

                    <div class="contact-item">
                        <h6>الهاتف</h6>
                        <p>01000000000</p>
                    </div>

                    <div class="contact-item">
                        <h6>البريد الإلكتروني</h6>
                        <p>info@wakil-hospital.com</p>
                    </div>

                </div>

            </div>

            <div class="col-lg-7 reveal">

                <div class="map-wrapper">

                    <iframe
                        src="https://maps.google.com/maps?q=cairo&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen="">
                    </iframe>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- SCROLL ANIMATION -->
<script>

document.addEventListener("DOMContentLoaded", function () {

    const reveals = document.querySelectorAll('.reveal');

    function revealOnScroll() {

        reveals.forEach((element) => {

            const windowHeight = window.innerHeight;
            const revealTop = element.getBoundingClientRect().top;
            const revealPoint = 100;

            if(revealTop < windowHeight - revealPoint){
                element.classList.add('active');
            }

        });

    }

    window.addEventListener('scroll', revealOnScroll);

    revealOnScroll();

});

</script>

@endsection

