@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">تعديل الحجز</h4>

    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')

      <div class="mb-3">
    <label class="form-label">اليوم</label>

    <select name="day" class="form-control" required>
        <option value="">اختر اليوم</option>

        @foreach($schedules as $schedule)
            <option value="{{ $schedule->day }}"
                {{ old('day', $appointment->day) == $schedule->day ? 'selected' : '' }}>
                {{ $schedule->day }}
            </option>
        @endforeach
    </select>
</div>

        <div class="mb-3">
    <label class="form-label">الوقت</label>
    <input type="time"
           name="appointment_time"
           class="form-control"
           value="{{ old('appointment_time', $appointment->appointment_time) }}"
           required>
  </div>


        <button class="btn btn-success">
            حفظ التعديل
        </button>
    </form>
</div>
@endsection
