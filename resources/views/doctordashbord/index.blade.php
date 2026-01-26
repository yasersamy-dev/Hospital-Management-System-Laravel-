@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="row">

        <!-- معلومات الدكتور -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset($user->doctor?->image ?? 'default-doctor.jpg') }}" 
                     class="card-img-top" alt="Doctor Image">
                <div class="card-body">
                    <h4 class="card-title">{{ $user->doctor?->name ?? 'غير معروف' }}</h4>
                    <p class="card-text"><strong>التخصص:</strong> {{ $user->doctor?->specialty?->name ?? 'غير محدد' }}</p>
                    <p class="card-text"><strong>العنوان:</strong> {{ $user->doctor?->address ?? 'غير محدد' }}</p>
                    <p class="card-text"><strong>الهاتف:</strong> {{ $user->doctor?->phone ?? 'غير محدد' }}</p>
                    <p class="card-text">{{ $user->doctor?->bio ?? '' }}</p>
                </div>
            </div>
        </div>

        <!-- جدول الحجوزات -->
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5>حجوزاتي</h5>
                </div>
                <div class="card-body p-0">
                    @if($appointments->count())
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>المريض</th>
                                <th>التاريخ</th>
                                <th>الوقت</th>
                                <th>الحالة</th>
                                <th>إجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->patient_name ?? 'غير معروف' }}</td> 
                               <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $appointment->appointment_time }}</td>
                                <td>
                                    @switch($appointment->status)
                                        @case('pending')
                                            <span class="badge bg-warning">قيد الانتظار</span>
                                            @break
                                        @case('confirmed')
                                            <span class="badge bg-success">مقبول</span>
                                            @break
                                        @case('completed')
                                            <span class="badge bg-primary">تم الحجز</span>
                                            @break
                                        @case('cancelled')
                                            <span class="badge bg-danger">مرفوض</span>
                                            @break
                                        @default
                                            <span class="badge bg-secondary">غير معروف</span>
                                    @endswitch
                                </td>
                                <td>
                                    <form action="{{ route('doctor.appointments.update', $appointment) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                            <option value="{{ \App\Models\Appointment::PENDING }}" {{ $appointment->status === \App\Models\Appointment::PENDING ? 'selected' : '' }}>انتظار</option>
                                            <option value="{{ \App\Models\Appointment::CONFIRMED }}" {{ $appointment->status === \App\Models\Appointment::CONFIRMED ? 'selected' : '' }}>مقبول</option>
                                            <option value="{{ \App\Models\Appointment::COMPLETED }}" {{ $appointment->status === \App\Models\Appointment::COMPLETED ? 'selected' : '' }}>تم الحجز</option>
                                            <option value="{{ \App\Models\Appointment::CANCELLED }}" {{ $appointment->status === \App\Models\Appointment::CANCELLED ? 'selected' : '' }}>مرفوض</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="p-3">
                        {{ $appointments->links() }}
                    </div>

                    @else
                        <div class="p-3 text-center text-muted">
                            لا توجد حجوزات حالياً
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
<script>
    var day = @json($appointment->date, JSON_UNESCAPED_UNICODE);
</script>

