@extends('layouts.app')

@section('title')
حجز موعد
@endsection

@section('content')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/appointment.css') }}">
@endpush

<div class="container py-5 booking-wrapper">

    <div class="row justify-content-center">

        <div class="col-lg-11">

            <div class="card booking-card">

                <div class="row g-0">

                    {{-- Doctor Side --}}
                    <div class="col-lg-4">

                        <div class="doctor-side d-flex flex-column justify-content-center h-100">

                            <div class="text-center">

                                <img src="{{ asset($doctor->image) }}"
                                     class="doctor-image mb-4"
                                     alt="{{ $doctor->name }}">

                                <h3 class="fw-bold mb-2">
                                    د / {{ $doctor->name }}
                                </h3>

                                <p class="mb-4">
                                    {{ $doctor->specialty->name ?? 'تخصص غير محدد' }}
                                </p>

                            </div>

                            <div class="doctor-info-box">

                                <h6 class="fw-bold mb-3">
                                    معلومات سريعة
                                </h6>

                                <p class="mb-2">
                                    ⭐ تقييم 4.8
                                </p>

                                <p class="mb-2">
                                    👨‍⚕️ +5 سنوات خبرة
                                </p>

                                <p class="mb-0">
                                    👥 +1200 مريض
                                </p>

                            </div>

                            <div class="doctor-info-box">

                                <h6 class="fw-bold mb-3">
                                    مواعيد العمل
                                </h6>

                                @foreach($schedules as $schedule)

                                    <span class="schedule-badge">
                                        {{ $schedule->day }}
                                    </span>

                                @endforeach

                            </div>

                        </div>

                    </div>

                    {{-- Booking Form --}}
                    <div class="col-lg-8">

                        <div class="booking-form">

                            <h2 class="section-title">
                                احجز موعدك الآن
                            </h2>

                            <p class="section-subtitle">
                                قم بإدخال بياناتك واختيار الموعد المناسب لك
                            </p>

                            @if(session('success'))

                                <div class="alert alert-success rounded-4">
                                    {{ session('success') }}
                                </div>

                            @endif

                            <form action="{{ route('appointments.store') }}" method="POST">

                                @csrf

                                <input type="hidden"
                                       name="doctor_id"
                                       value="{{ $doctor->id }}">

                                <div class="row">

                                    {{-- Patient Name --}}
                                    <div class="col-md-6 mb-4">

                                        <label class="form-label">
                                            اسم المريض
                                        </label>

                                        <input type="text"
                                               name="patient_name"
                                               class="form-control"
                                               placeholder="ادخل اسمك بالكامل"
                                               value="{{ auth()->check() ? auth()->user()->name : old('patient_name') }}">

                                    </div>

                                    {{-- Phone --}}
                                    <div class="col-md-6 mb-4">

                                        <label class="form-label">
                                            رقم الهاتف
                                        </label>

                                        <input type="text"
                                               name="patient_phone"
                                               class="form-control"
                                               placeholder="ادخل رقم الهاتف"
                                               value="{{ auth()->check() ? auth()->user()->phone : old('patient_phone') }}">

                                    </div>

                                    {{-- Day --}}
                                    <div class="col-md-6 mb-4">

                                        <label class="form-label">
                                            اليوم
                                        </label>

                                        <select name="day"
                                                class="form-select"
                                                required>

                                            <option value="">
                                                اختر اليوم
                                            </option>

                                            @foreach($schedules as $schedule)

                                                <option value="{{ $schedule->day }}">
                                                    {{ $schedule->day }}
                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                    {{-- Time --}}
                                    <div class="col-md-6 mb-4">

                                        <label class="form-label">
                                            وقت الحجز
                                        </label>

                                        <select name="appointment_time"
                                                class="form-select"
                                                required>

                                            <option value="">
                                                اختر الوقت
                                            </option>

                                            @forelse($availableTimes as $time)

                                                @php
                                                    $timeAr = \Carbon\Carbon::createFromTimeString($time)->format('h:i A');

                                                    $timeAr = str_replace('AM', 'صباحاً', $timeAr);
                                                    $timeAr = str_replace('PM', 'مساءً', $timeAr);
                                                @endphp

                                                <option value="{{ $time }}">
                                                    {{ $timeAr }}
                                                </option>

                                            @empty

                                                <option disabled>
                                                    لا توجد مواعيد متاحة
                                                </option>

                                            @endforelse

                                        </select>

                                        @error('appointment_time')

                                            <small class="text-danger d-block mt-2">
                                                {{ $message }}
                                            </small>

                                        @enderror

                                    </div>

                                    
                                    <div class="col-12 mb-4">

                                        <label class="form-label">
                                            ملاحظات إضافية
                                        </label>

                                        <textarea name="notes"
                                                  class="form-control"
                                                  placeholder="اكتب أي ملاحظات إضافية للطبيب..."></textarea>

                                    </div>

                                    {{-- Submit --}}
                                    <div class="col-12">

                                        <button class="btn btn-primary booking-btn w-100">

                                            تأكيد الحجز

                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection