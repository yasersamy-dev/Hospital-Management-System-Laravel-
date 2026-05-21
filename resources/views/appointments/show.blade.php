@extends('layouts.app')

@section('title', 'حجوزاتي')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

        <div>
            <h2 class="fw-bold">
                مواعيد الحجز
            </h2>

            <p class="text-muted mb-0">
                جميع الحجوزات الخاصة بك
            </p>
        </div>

    </div>

    @if($appointments->count())

        <div class="row g-4">

            @foreach($appointments as $appointment)

                <div class="col-lg-6">

                    <div class="card appointment-card h-100">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-start mb-4">

                                <div>

                                    <h5 class="fw-bold mb-1">
                                        د/ {{ $appointment->doctor->name }}
                                    </h5>

                                    <small class="text-muted">
                                        {{ $appointment->day }}
                                    </small>

                                </div>

                                <span class="badge bg-success status-badge">
                                    {{ $appointment->appointment_time }}
                                </span>

                            </div>

                            <div class="d-flex gap-2">

                                <a href="{{ route('appointments.edit', $appointment->id) }}"
                                   class="btn btn-outline-primary btn-modern flex-fill">

                                    <i class="bi bi-pencil-square"></i>
                                    تعديل
                                </a>

                                <form action="{{ route('appointments.destroy', $appointment->id) }}"
                                      method="POST"
                                      class="flex-fill">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('هل أنت متأكد من حذف الحجز؟')"
                                        class="btn btn-danger btn-modern w-100">

                                        <i class="bi bi-trash"></i>
                                        حذف
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="card border-0 shadow-sm rounded-4 p-5 text-center">

            <i class="bi bi-calendar-x text-secondary"
               style="font-size:70px"></i>

            <h4 class="mt-3">
                لا توجد حجوزات
            </h4>

            <p class="text-muted">
                لم تقم بأي حجز حتى الآن
            </p>

        </div>

    @endif

</div>

@endsection