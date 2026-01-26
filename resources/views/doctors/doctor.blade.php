@extends('layouts.app')

@section('title') {{ $doctor->name }} @endsection

@section('content')
<div class="container py-5">

    <div class="row">
        <!-- صورة الدكتور -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm rounded-4">
                <img src="{{ asset($doctor->image) }}" 
                     class="card-img-top rounded-4" 
                     alt="{{ $doctor->name }}">
            </div>
        </div>

        <!-- تفاصيل الدكتور -->
        <div class="col-md-8">
            <h2 class="fw-bold">{{ $doctor->name }}</h2>

            <h5 class="text-primary">
                {{ $doctor->specialty->name ?? 'تخصص غير محدد' }}
            </h5>

            <p class="mt-3 text-muted">
                {{ $doctor->bio ?? 'لا توجد نبذة تعريفية متاحة.' }}
            </p>

          
            <div class="mb-3">
                <span class="text-warning fs-5">★ ★ ★ ★ ☆</span>
                <span class="text-muted">4.5 / 5</span>
            </div>

            <!-- زر الحجز -->
            
            <a href="{{ route('appointments.create', $doctor->id)}}"  
               class="btn btn-primary px-4 py-2 rounded-3">
               احجز موعد
            </a>

            
            <!-- معلومات الاتصال -->
            <div class="mt-4">
                <h5 class="fw-bold">معلومات الاتصال</h5>
                <p>📞 الهاتف: {{ $doctor->phone ?? 'غير متوفر' }}</p>
                <p>📧 البريد: {{ $doctor->email ?? 'غير متوفر' }}</p>
            </div>
        </div>
    </div>


    <!-- المواعيد -->
    <div class="mt-5">
        <h4 class="fw-bold mb-3">مواعيد العمل</h4>

        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>اليوم</th>
                    <th>من</th>
                    <th>إلى</th>
                    <th>الحالة</th>
                </tr>
            </thead>

            <tbody>
                @foreach($doctor->schedules as $time)
                <tr>
                    <td>{{ $time->day }}</td>
                    <td>{{ $time->from }}</td>
                    <td>{{ $time->to }}</td>
                    <td>
                        <span class="badge bg-success">متاح</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- الخدمات -->
    <div class="mt-5">
        <h4 class="fw-bold mb-3">الخدمات التي يقدمها</h4>
        <ul class="list-group">
            <li class="list-group-item">كشف عيادة</li>
            <li class="list-group-item">متابعة الحالات</li>
            <li class="list-group-item">استشارات طبية</li>
            <li class="list-group-item">خطة علاجية</li>
        </ul>
    </div>


    <!-- الموقع -->
    <div class="mt-5 mb-5">
        <h4 class="fw-bold mb-3">موقع العيادة</h4>

        <p class="text-muted">
            {{ $doctor->address ?? 'لا يوجد عنوان متاح' }}
        </p>

        @if($doctor->map)
            <div class="rounded-4 overflow-hidden shadow-sm" style="height: 350px;">
                {!! $doctor->map !!}
            </div>
        @endif
    </div>

</div>
@endsection
