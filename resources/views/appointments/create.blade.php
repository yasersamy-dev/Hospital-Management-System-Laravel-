@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4 text-center my-4">
     حجز موعد مع د/ {{ $doctor->name }}
    </h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf

        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">

        <div class="mb-3">
            <label class="form-label">اسم المريض</label>
            <input type="text" name="patient_name"  class="form-control"  value="{{ auth()->check() ? auth()->user()->name : old('patient_name') }}" >
        </div>

        <div class="mb-3">
            <label class="form-label">رقم الهاتف</label>
            <input type="text" name="patient_phone" class="form-control"   value="{{ auth()->check() ? auth()->user()->phone : old('patient_phone') }}">
        </div>

     <div class="mb-3">
       <label class="form-label">اليوم</label>
       <select name="day" class="form-control" required>
        <option value="">اختر اليوم</option>
        @foreach($schedules as $schedule)
            <option value="{{ $schedule->day }}">
                {{ $schedule->day }}
            </option>
        @endforeach
        </select>
     </div>
    
   <div class="mb-3">
    <label class="form-label">وقت الحجز</label>

    <select name="appointment_time" class="form-control" required>
        <option value="">اختر الوقت</option>

        @forelse($availableTimes as $time)
            @php
                // تحويل الوقت من 24 ساعة لـ 12 ساعة + AM/PM
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
        <div class="mb-3">
            <label class="form-label">ملاحظات</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        @auth
            
        @endauth
        <button class="btn btn-primary">
            تأكيد الحجز
        </button>
    </form>

</div>

    {{-- رسالة الخطأ --}}
    @error('appointment_time')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


    
</div>
@endsection
