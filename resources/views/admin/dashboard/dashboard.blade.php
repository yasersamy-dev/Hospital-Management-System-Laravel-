@extends('adminlte::page')

@section('title', 'لوحة التحكم')

@section('content_header')
    <h1>لوحة التحكم</h1>
@stop

@section('content')


<div class="row mb-3">
    <div class="col-md-12 d-flex gap-2">

        <a href="{{ route('doctors.create') }}" class="btn btn-success">
            <i class="fas fa-user-md"></i> إضافة طبيب
        </a>

        <a href="{{ route('users.create')}}" class="btn btn-info">
            <i class="fas fa-user-plus"></i> إضافة مستخدم
        </a>
    </div>
</div>


<div class="row">

    <div class="col-md-3 col-sm-6">
        <a href="{{ route('users.index')}}">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $usersCount }}</h3>
                    <p>عدد المستخدمين</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
            </div>
        </a>
    </div>

    <div class="col-md-3 col-sm-6">
        <a href="{{ route('doctors.index')}}">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $doctorsCount }}</h3>
                    <p>عدد الأطباء</p>
                </div>
                <div class="icon"><i class="fas fa-user-md"></i></div>
            </div>
        </a>
    </div>

    <div class="col-md-3 col-sm-6">
        <a href="{{ route('patients.index')}}">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $patientsCount }}</h3>
                    <p>عدد المرضى</p>
                </div>
                <div class="icon"><i class="fas fa-procedures"></i></div>
            </div>
        </a>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $appointmentsToday }}</h3>
                <p>حجوزات اليوم</p>
            </div>
            <div class="icon"><i class="fas fa-calendar-check"></i></div>
        </div>
    </div>

    {{-- كارت التخصصات --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('specialties.index') }}">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $specializationsCount }}</h3>
                    <p>عدد التخصصات</p>
                </div>
                <div class="icon"><i class="fas fa-stethoscope"></i></div>
            </div>
        </a>
    </div>

</div>

{{-- تقييم المرضى --}}
<div class="row mt-3">
    <div class="col-md-6 col-sm-12">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3> ⭐</h3>
                <p>متوسط تقييم المرضى</p>
            </div>
            <div class="icon">
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{  0 }}</h3>
                <p>عدد الشكاوى هذا الشهر</p>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
        </div>
    </div>
</div>


<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">عدد الحجوزات خلال آخر 7 أيام</h3>
            </div>
            <div class="card-body">
                <canvas id="appointmentsChart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>


{{-- أحدث الحجوزات --}}
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">أحدث الحجوزات</h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>المريض</th>
                    <th>الطبيب</th>
                    <th>التاريخ</th>
                    <th>الوقت</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestAppointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient_name }}</td>
                    <td>{{ $appointment->doctor->name ?? '-' }}</td>
                    <td>{{ $appointment->day ?? '-' }}</td>
                    <td>{{ $appointment->appointment_time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = @json($appointmentsChartLabels);
const data = @json($appointmentsChartData);

const ctx = document.getElementById('appointmentsChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'عدد الحجوزات',
            data: data,
            fill: false,
            tension: 0.4
        }]
    }
});
</script>
@stop

