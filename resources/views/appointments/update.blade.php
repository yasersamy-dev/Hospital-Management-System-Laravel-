@extends('layouts.app')

@section('title')
تعديل الحجز
@endsection

@section('content')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/updatebooking.css') }}">
@endpush

<div class="container py-5 edit-wrapper">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card edit-card">

                <div class="row g-0">

                    {{-- Doctor Side --}}
                    <div class="col-lg-4">

                        <div class="doctor-side d-flex flex-column justify-content-center h-100">

                            <div class="text-center">

                                <img src="{{ asset($appointment->doctor->image) }}"
                                     class="doctor-image mb-4"
                                     alt="{{ $appointment->doctor->name }}">

                                <h3 class="fw-bold mb-2">
                                    د / {{ $appointment->doctor->name }}
                                </h3>

                                <p class="mb-4">
                                    {{ $appointment->doctor->specialty->name ?? 'تخصص غير محدد' }}
                                </p>

                            </div>

                            <div class="doctor-box">

                                <h6 class="fw-bold mb-3">
                                    بيانات الحجز الحالية
                                </h6>

                                <p>
                                    📅 اليوم:
                                    {{ $appointment->day }}
                                </p>

                                <p>
                                    ⏰ الوقت:
                                    {{ $appointment->appointment_time }}
                                </p>

                                <p class="mb-0">
                                    👤 المريض:
                                    {{ $appointment->patient_name }}
                                </p>

                            </div>

                            <div class="doctor-box">

                                <h6 class="fw-bold mb-3">
                                    معلومات سريعة
                                </h6>

                                <div class="info-badge">
                                    ⭐ تقييم 4.8
                                </div>

                                <div class="info-badge">
                                    👨‍⚕️ +5 سنوات خبرة
                                </div>

                                <div class="info-badge">
                                    👥 +1200 مريض
                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- Form Side --}}
                    <div class="col-lg-8">

                        <div class="edit-form">

                            <h2 class="page-title">
                                تعديل الحجز
                            </h2>

                            <p class="page-subtitle">
                                يمكنك تعديل اليوم أو وقت الحجز بسهولة
                            </p>

                            @if ($errors->any())

                                <div class="alert alert-danger rounded-4">

                                    <ul class="mb-0">

                                        @foreach ($errors->all() as $error)

                                            <li>{{ $error }}</li>

                                        @endforeach

                                    </ul>

                                </div>

                            @endif

                            <form action="{{ route('appointments.update', $appointment->id) }}"
                                  method="POST">

                                @csrf
                                @method('PUT')

                                <div class="row">

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

                                                <option value="{{ $schedule->day }}"
                                                    {{ old('day', $appointment->day) == $schedule->day ? 'selected' : '' }}>

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

                                        <input type="time"
                                               name="appointment_time"
                                               class="form-control"
                                               value="{{ old('appointment_time', $appointment->appointment_time) }}"
                                               required>

                                    </div>

                                    {{-- Notes --}}
                                    <div class="col-12 mb-4">

                                        <label class="form-label">
                                            ملاحظات إضافية
                                        </label>

                                        <textarea name="notes"
                                                  class="form-control"
                                                  rows="5"
                                                  placeholder="اكتب أي ملاحظات إضافية...">{{ old('notes', $appointment->notes) }}</textarea>

                                    </div>

                                    {{-- Buttons --}}
                                    <div class="col-12">

                                        <div class="d-flex gap-3">

                                            <button class="btn btn-success save-btn flex-grow-1">

                                                حفظ التعديل

                                            </button>

                                            <a href="{{ url()->previous() }}"
                                               class="btn btn-outline-secondary save-btn flex-grow-1 d-flex align-items-center justify-content-center">

                                                رجوع

                                            </a>

                                        </div>

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