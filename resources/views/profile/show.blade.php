@extends('layouts.app')

@section('title', 'الملف الشخصي')

@section('content')
<div class="container my-5">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

  {{-- ================= Profile Card ================= --}}
  <div class="card border-0 shadow-lg mb-4">
    <div class="card-body text-center">

      <div class="position-relative d-inline-block">
        @if(Auth::user()->profile_image && file_exists(public_path(Auth::user()->profile_image)))
          <img src="{{ asset(Auth::user()->profile_image) }}"
               class="rounded-circle border shadow"
               width="140" height="140"
               style="object-fit: cover;">
        @else
          <i class="bi bi-person-circle text-secondary" style="font-size:140px;"></i>
        @endif

        <span class="badge bg-primary position-absolute bottom-0 end-0 px-3 py-2 shadow">
          {{ Auth::user()->role }}
        </span>
      </div>

      <h3 class="mt-3 fw-bold">{{ Auth::user()->name }}</h3>
      <p class="text-muted mb-1">{{ Auth::user()->email }}</p>
      <small class="text-success">
        عضو منذ {{ Auth::user()->created_at->format('Y-m-d') }}
      </small>

      <div class="mt-4 d-flex justify-content-center gap-2">
        <a href="{{ route('profile.edit') }}" class="btn btn-warning fw-semibold px-4">
          <i class="bi bi-pencil-square"></i> تعديل
        </a>
        <a href="{{ url('/') }}" class="btn btn-outline-primary fw-semibold px-4">
          <i class="bi bi-house"></i> الرئيسية
        </a>
      </div>
    </div>
  </div>

  {{-- ================= User Info ================= --}}
  <div class="row g-4 mb-5">
    <div class="col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">
          <h6 class="fw-bold mb-3 text-primary">
            <i class="bi bi-info-circle"></i> المعلومات الشخصية
          </h6>

          <p class="mb-2">
            <strong>📞 الموبايل:</strong>
            <span class="text-muted">{{ Auth::user()->phone ?? 'غير متوفر' }}</span>
          </p>

          <p class="mb-2">
            <strong>📍 العنوان:</strong>
            <span class="text-muted">{{ Auth::user()->address ?? 'غير متوفر' }}</span>
          </p>

          <p class="mb-0">
            <strong>👤 نوع الحساب:</strong>
            <span class="badge bg-info text-dark">{{ Auth::user()->role }}</span>
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card border-0 shadow-sm h-100 bg-light">
        <div class="card-body d-flex align-items-center justify-content-center text-center">
          <div>
            <i class="bi bi-calendar-check text-success" style="font-size:50px;"></i>
            <h5 class="mt-3 fw-bold">إدارة مواعيدك بسهولة</h5>
            <p class="text-muted mb-0">
              تابع، عدل، أو ألغِ المواعيد من مكان واحد
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

{{-- ================= Appointments ================= --}}
<hr>
<h5 class="text-center mb-4">مواعيد الحجز</h5>

@if($appointments->count())
    @foreach($appointments as $appointment)
        <div class="card mb-3 border-0 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                <div>
                    <h6 class="fw-bold mb-1">
                        د/ {{ $appointment->doctor->name }}
                    </h6>
                    <small class="text-muted">
                        {{ $appointment->day }} — {{ $appointment->appointment_time }}
                    </small>
                </div>

                <div class="d-flex gap-2 mt-2 mt-md-0">
                    
                            <a href="{{ route('appointments.edit', $appointment->id) }}"
                                          class="btn btn-sm btn-outline-primary">
                                               تعديل
                            </a>


                     <form action="{{ route('appointments.destroy', $appointment->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('هل أنت متأكد؟')"
                                        class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                  
                </div>

            </div>
        </div>
    @endforeach
@else
    <p class="text-center text-muted">
        لا توجد حجوزات حتى الآن
    </p>
@endif


</div>
@endsection
