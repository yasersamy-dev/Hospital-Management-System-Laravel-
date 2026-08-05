@extends('adminlte::page')

@section('title', 'لوحة التحكم')

@section('content_header')
    <h1>لوحة التحكم</h1>
@stop

@push('css')
         <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endpush

@section('content')


{{-- ================= HERO SECTION ================= --}}

<div class="card border-0 shadow-lg hero-card mb-4">

    <div class="card-body p-4">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-primary px-3 py-2 mb-3">
                    لوحة التحكم الرئيسية
                </span>

                <h2 class="fw-bold mb-3">
                    👋 أهلاً بك،
                    <span class="text-primary">
                        {{ auth()->user()->name }}
                    </span>
                </h2>

                <p class="text-muted mb-4">

                    يمكنك إدارة الأطباء والمرضى والحجوزات والتخصصات
                    ومتابعة جميع إحصائيات المستشفى من مكان واحد.

                </p>

                <div class="d-flex flex-wrap gap-3">

                    <a href="{{ route('doctors.create') }}"
                       class="btn btn-primary btn-lg">

                        <i class="fas fa-user-md me-2"></i>

                        إضافة طبيب

                    </a>

                    <a href="{{ route('users.create') }}"
                       class="btn btn-outline-primary btn-lg">

                        <i class="fas fa-user-plus me-2"></i>

                        إضافة مستخدم

                    </a>

                    <a href="{{ route('chat.index') }}"
                       class="btn btn-outline-dark btn-lg">

                        <i class="fas fa-comments me-2"></i>

                        الرسائل

                    </a>

                </div>

            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">

                <div class="card hero-status border-0">

                    <div class="card-body">

                        <h5 class="fw-bold mb-4">

                            حالة النظام

                        </h5>

                        <div class="d-flex justify-content-between mb-3">

                            <span>

                                <i class="fas fa-circle text-success"></i>

                                النظام

                            </span>

                            <strong>

                                يعمل

                            </strong>

                        </div>

                        <div class="d-flex justify-content-between mb-3">

                            <span>

                                <i class="fas fa-calendar-check text-primary"></i>

                                حجوزات اليوم

                            </span>

                            <strong>

                                {{ $appointmentsToday }}

                            </strong>

                        </div>

                        <div class="d-flex justify-content-between mb-3">

                            <span>

                                <i class="fas fa-user-md text-success"></i>

                                الأطباء

                            </span>

                            <strong>

                                {{ $doctorsCount }}

                            </strong>

                        </div>

                        <div class="d-flex justify-content-between">

                            <span>

                                <i class="fas fa-procedures text-warning"></i>

                                المرضى

                            </span>

                            <strong>

                                {{ $patientsCount }}

                            </strong>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ================= Statistics ================= --}}

<div class="row g-4 mt-2">

    <!-- Users -->
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stats-card users-card">
            <div class="stats-top">
                <div class="stats-icon">
                    <i class="fas fa-users"></i>
                </div>

                <span class="stats-badge">
                    +12%
                </span>
            </div>

            <h2>{{ $usersCount }}</h2>

            <p>إجمالي المستخدمين</p>

            <a href="{{ route('users.index') }}">
                عرض التفاصيل
                <i class="fas fa-arrow-left"></i>
            </a>

        </div>
    </div>

    <!-- Doctors -->

    <div class="col-xl-3 col-lg-6 col-md-6">

        <div class="stats-card doctors-card">

            <div class="stats-top">

                <div class="stats-icon">

                    <i class="fas fa-user-md"></i>

                </div>

                <span class="stats-badge">

                    +4

                </span>

            </div>

            <h2>{{ $doctorsCount }}</h2>

            <p>عدد الأطباء</p>

            <a href="{{ route('doctors.index') }}">

                عرض التفاصيل

                <i class="fas fa-arrow-left"></i>

            </a>

        </div>

    </div>

    <!-- Patients -->

    <div class="col-xl-3 col-lg-6 col-md-6">

        <div class="stats-card patients-card">

            <div class="stats-top">

                <div class="stats-icon">

                    <i class="fas fa-procedures"></i>

                </div>

                <span class="stats-badge">

                    اليوم

                </span>

            </div>

            <h2>{{ $patientsCount }}</h2>

            <p>عدد المرضى</p>

            <a href="{{ route('patients.index') }}">

                عرض التفاصيل

                <i class="fas fa-arrow-left"></i>

            </a>

        </div>

    </div>

    <!-- Today -->

    <div class="col-xl-3 col-lg-6 col-md-6">

        <div class="stats-card appointment-card">

            <div class="stats-top">

                <div class="stats-icon">

                    <i class="fas fa-calendar-check"></i>

                </div>

                <span class="stats-badge">

                    اليوم

                </span>

            </div>

            <h2>{{ $appointmentsToday }}</h2>

            <p>حجوزات اليوم</p>

        </div>

    </div>

    <!-- Specialties -->

    <div class="col-xl-3 col-lg-6 col-md-6 mt-4">

        <div class="stats-card specialty-card">

            <div class="stats-top">

                <div class="stats-icon">

                    <i class="fas fa-stethoscope"></i>

                </div>

            </div>

            <h2>{{ $specializationsCount }}</h2>

            <p>التخصصات</p>

            <a href="{{ route('specialties.index') }}">

                عرض التفاصيل

            </a>

        </div>

    </div>

    <!-- Rating -->

    <div class="col-xl-3 col-lg-6 col-md-6 mt-4">

        <div class="stats-card rating-card">

            <div class="stats-top">

                <div class="stats-icon">

                    <i class="fas fa-star"></i>

                </div>

            </div>

            <h2>4.8</h2>

            <p>متوسط التقييم</p>

        </div>

    </div>

    <!-- Complaints -->

    <div class="col-xl-3 col-lg-6 col-md-6 mt-4">

        <div class="stats-card complaint-card">

            <div class="stats-top">

                <div class="stats-icon">

                    <i class="fas fa-exclamation-circle"></i>

                </div>

            </div>

            <h2>0</h2>

            <p>الشكاوى</p>

        </div>

    </div>

    <!-- Messages -->

    <div class="col-xl-3 col-lg-6 col-md-6 mt-4" >

        <div class="stats-card chat-card">

            <div class="stats-top">

                <div class="stats-icon">

                    <i class="fas fa-comments"></i>

                </div>

            </div>

            <h2>24</h2>

            <p>الرسائل</p>

            <a href="{{ route('chat.index') }}">

                فتح المحادثات

            </a>

        </div>

    </div>

</div>


{{-- ================= Analytics ================= --}}

<div class="row mt-4">

    <div class="col-xl-9">

        <div class="chart-card">

            <div class="chart-header">

                <div>

                    <h4 class="fw-bold mb-1">

                        إحصائيات الحجوزات

                    </h4>

                    <span class="text-muted">

                        آخر 7 أيام

                    </span>

                </div>

                <div>

                    <button class="btn btn-light active">
                        أسبوع
                    </button>

                    <button class="btn btn-light">
                        شهر
                    </button>

                    <button class="btn btn-light">
                        سنة
                    </button>

                </div>

            </div>

            <div class="chart-body">

                <canvas id="appointmentsChart"></canvas>

            </div>

        </div>

    </div>

    <div class="col-xl-3">

        <div class="analytics-card">

            <h5 class="fw-bold mb-4">

                إحصائيات سريعة

            </h5>

            <div class="analytics-item">

                <span>

                    حجوزات اليوم

                </span>

                <strong>

                    {{ $appointmentsToday }}

                </strong>

            </div>

            <div class="progress mb-4">

                <div class="progress-bar bg-primary"

                     style="width:70%">

                </div>

            </div>

            <div class="analytics-item">

                <span>

                    المستخدمون

                </span>

                <strong>

                    {{ $usersCount }}

                </strong>

            </div>

            <div class="progress mb-4">

                <div class="progress-bar bg-success"

                     style="width:80%">

                </div>

            </div>

            <div class="analytics-item">

                <span>

                    الأطباء

                </span>

                <strong>

                    {{ $doctorsCount }}

                </strong>

            </div>

            <div class="progress mb-4">

                <div class="progress-bar bg-warning"

                     style="width:55%">

                </div>

            </div>

            <div class="analytics-item">

                <span>

                    المرضى

                </span>

                <strong>

                    {{ $patientsCount }}

                </strong>

            </div>

            <div class="progress">

                <div class="progress-bar bg-danger"

                     style="width:90%">

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ================= Latest Appointments ================= --}}

<div class="card modern-card mt-4">

    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">

        <div>

            <h4 class="fw-bold mb-1">

                <i class="fas fa-calendar-check text-primary me-2"></i>

                أحدث الحجوزات

            </h4>

            <small class="text-muted">

                آخر الحجوزات المسجلة في النظام

            </small>

        </div>

        <a href="#" class="btn btn-outline-primary">

            عرض الكل

        </a>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>المريض</th>

                        <th>الطبيب</th>

                        <th>التاريخ</th>

                        <th>الوقت</th>

                        <th>الحالة</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($latestAppointments as $appointment)

                    <tr>

                        <td>

                            <div class="d-flex align-items-center">

                                <div class="avatar-circle bg-primary">

                                    {{ strtoupper(substr($appointment->patient_name,0,1)) }}

                                </div>

                                <div class="ms-3">

                                    <strong>

                                        {{ $appointment->patient_name }}

                                    </strong>

                                </div>

                            </div>

                        </td>

                        <td>

                            <span class="fw-semibold">

                                <i class="fas fa-user-md text-success me-1"></i>

                                {{ $appointment->doctor->name ?? '-' }}

                            </span>

                        </td>

                        <td>

                            {{ $appointment->day ?? '-' }}

                        </td>

                        <td>

                            <span class="badge bg-info">

                                {{ $appointment->appointment_time }}

                            </span>

                        </td>

                        <td>

                            @php

                                $status = $appointment->status ?? 'pending';

                            @endphp

                            @if($status=='confirmed')

                                <span class="badge bg-success">

                                    مؤكد

                                </span>

                            @elseif($status=='cancelled')

                                <span class="badge bg-danger">

                                    ملغي

                                </span>

                            @else

                                <span class="badge bg-warning text-dark">

                                    قيد الانتظار

                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center py-5">

                            <i class="fas fa-calendar-times fa-2x text-muted mb-3"></i>

                            <br>

                            لا توجد حجوزات حالياً

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const labels = @json($appointmentsChartLabels);

const data = @json($appointmentsChartData);

const ctx = document.getElementById('appointmentsChart').getContext('2d');

const gradient = ctx.createLinearGradient(0,0,0,350);

gradient.addColorStop(0,'rgba(37,99,235,.35)');

gradient.addColorStop(1,'rgba(37,99,235,0)');

new Chart(ctx,{

type:'line',

data:{

labels:labels,

datasets:[{

label:'عدد الحجوزات',

data:data,

fill:true,

backgroundColor:gradient,

borderColor:'#2563eb',

borderWidth:4,

pointRadius:5,

pointHoverRadius:8,

pointBackgroundColor:'#2563eb',

tension:.45

}]

},

options:{

responsive:true,

maintainAspectRatio:false,

plugins:{

legend:{

display:false

}

},

interaction:{

intersect:false,

mode:'index'

},

scales:{

x:{

grid:{

display:false

}

},

y:{

beginAtZero:true,

ticks:{

stepSize:1

},

grid:{

color:'#eef2f7'

}

}

}

}

});

</script>

@stop
