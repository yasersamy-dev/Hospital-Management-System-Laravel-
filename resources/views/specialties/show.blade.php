@extends('layouts.app')

@section('title')
    التخصص — {{ $specialty->name }}
@endsection

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/specialty.css')}}">
</head>

<!-- HERO -->
<section class="hero" style="
        background-image: linear-gradient(
            rgba(0,0,0,0.55),
            rgba(0,0,0,0.55)
        ),
        url('{{ $specialty->image ? asset($specialty->image) : 'https://via.placeholder.com/1400x400' }}');
        background-position: center;
        background-size: cover;
        min-height: 420px;
    ">
    <div class="container text-center text-white">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold">قسم {{ $specialty->name }}</h1>
                <p class="lead mt-3">{{ $specialty->description ?? 'رعاية طبية متكاملة وفق أعلى المعايير العالمية.' }}</p>
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <a href="#doctors" class="btn btn-primary btn-lg">عرض الأطباء</a>
                    <a href="#services" class="btn btn-outline-light btn-lg">الخدمات</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- نبذه عن التخصص --}}
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-4">
            <h2 class="section-title">لماذا تختار قسم {{ $specialty->name }}؟</h2>
            <p>يقدم قسم {{ $specialty->name }} رعاية طبية متكاملة وفق أعلى المعايير العالمية، من خلال فريق متخصص يمتلك خبرة واسعة في تشخيص وعلاج مختلف الحالات، مع الاعتماد على أحدث الأجهزة والتقنيات لضمان أفضل نتائج ممكنة للمريض.</p>
            <ul class="list-unstyled mt-3">
                <li>• فريق طبي متخصص بخبرة واسعة</li>
                <li>• أحدث الأجهزة والتقنيات الطبية</li>
                <li>• متابعة دقيقة لجميع الحالات</li>
                <li>• خطط علاجية مخصصة لكل مريض</li>
            </ul>
        </div>
        <div class="col-lg-6">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="shadow-sm stat-box bg-light text-center">
                        {{-- عدد دكاتر القسم  --}}
                        <h3 class="mb-0">{{ $specialty->doctors->count() ?? 0 }}</h3>
                        <small class="text-muted">طبيب</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shadow-sm stat-box bg-light text-center">
                        {{--عدد المرضي  حتي الان في القسم--}}
                        <h3 class="mb-0">{{$specialty->appointments_count ?? '1500+'}}</h3>
                        <small class="text-muted">عدد المرضي حتي الان في القسم</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shadow-sm stat-box bg-light text-center">
                        <h3 class="mb-0">{{ $specialty->satisfaction_rate ?? '95%' }}</h3>
                        <small class="text-muted">نسبة رضا المرضى</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shadow-sm stat-box bg-light text-center">
                        <h3 class="mb-0">{{ $specialty->services_count ?? 10 }}</h3>
                        <small class="text-muted">خدمات</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- عن التخصص --}}
<div class="container py-4">
    <h2 class="section-title">عن التخصص</h2>
    <p>{!! $specialty->description ?? 'يقدم القسم رعاية تشخيصية وعلاجية متقدمة موجهة لجميع الفئات العمرية مع خطط متابعة واضحة ومحددة.' !!}</p>
</div>


{{-- اطباء القسم --}}
<div id="doctors" class="container py-5">
    <h2 class="section-title">أطباء القسم</h2>
    <div class="row g-4">
        @forelse($specialty->doctors as $doctor)
            <div class="col-md-4">
                <div class="card doctor-card h-100 shadow-sm">
                    <img src="{{  asset($doctor->image) }}" class="card-img-top" alt="{{ $doctor->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $doctor->name }}</h5>
                        <p class="mb-1 text-muted">{{ $doctor->title ?? $specialty->name }}</p>
                        <p class="small text-truncate" style="max-height:48px;">{{ Str::limit($doctor->bio, 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            
                            <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-outline-primary btn-sm">عرض الملف</a>
                            <a href="{{ route('appointments.create', $doctor->id)}}" class="btn btn-primary btn-sm">حجز موعد</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">لا يوجد أطباء مسجلين في هذا التخصص حالياً</p>
            </div>
        @endforelse
    </div>
</div>

{{-- الاسئلة الشعة عن القسم  --}}
<div class="container py-4">
    <h2 class="section-title">الأسئلة الشائعة عن القسم</h2>
    <div class="accordion" id="faqAccordion">
        @php
            $faqs = $specialty->faqs ?? [
                ['q' => 'هل يمكن الحجز مسبقًا عبر الموقع؟', 'a' => 'نعم، يمكنك الحجز بسهولة من خلال اختيار الطبيب المناسب وتحديد الموعد.'],
                ['q' => 'هل يتطلب الكشف أي تحضيرات؟', 'a' => 'قد يتطلب ذلك في بعض الحالات، وسيتم توضيحه بواسطة الطبيب قبل الزيارة.'],
                ['q' => 'ما مدة الكشف؟', 'a' => 'تتراوح مدة الكشف بين 15 – 30 دقيقة حسب حالة المريض.'],
            ];
        @endphp

        @foreach($faqs as $i => $faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $i }}">
                    <button class="accordion-button {{ $i>0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="{{ $i==0 ? 'true' : 'false' }}" aria-controls="collapse{{ $i }}">
                        {{ $faq['q'] }}
                    </button>
                </h2>
                <div id="collapse{{ $i }}" class="accordion-collapse collapse {{ $i==0 ? 'show' : '' }}" aria-labelledby="heading{{ $i }}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">{{ $faq['a'] }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<div class="container py-5 text-center">
    <div class="card shadow-sm p-4">
        <h4 class="mb-2">هل ترغب في حجز موعد بقسم {{ $specialty->name }}؟</h4>
        <p class="text-muted mb-3">اختر الطبيب الأنسب لك أو اتصل بنا للحصول على مساعدة فورية.</p>
        <a href="#doctors" class="btn btn-primary btn-lg me-2">عرض الأطباء</a>
        {{-- <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">تواصل معنا</a> --}}
    </div>
</div>

@endsection
