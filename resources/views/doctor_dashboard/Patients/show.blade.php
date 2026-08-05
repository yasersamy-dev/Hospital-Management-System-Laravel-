@extends('layouts.doctor-dashboard')

@section('title','بيانات المريض')

@section('content')

<div class="row">

    <div class="col-lg-4">

        <div class="card card-primary card-outline">

            <div class="card-body text-center">

                

                <h3>{{ $patient->name }}</h3>

                <p class="text-muted">
                    مريض
                </p>

                <hr>

                <strong>
                    <i class="fas fa-envelope"></i>
                    البريد
                </strong>

                <p>{{ $patient->email }}</p>

                <hr>

                <strong>
                    <i class="fas fa-phone"></i>
                    الهاتف
                </strong>

                <p>{{ $patient->phone ?? '-' }}</p>

                <hr>

                <strong>
                    <i class="fas fa-map-marker-alt"></i>
                    العنوان
                </strong>

                <p>{{ $patient->address ?? '-' }}</p>

                <hr>

                <strong>
                    <i class="fas fa-calendar"></i>
                    تاريخ التسجيل
                </strong>

                <p>{{ $patient->created_at->format('d M Y') }}</p>

            </div>

        </div>

    </div>


    <div class="col-lg-8">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    سجل الحجوزات
                </h3>
            </div>

            <div class="card-body p-0">

                <table class="table table-hover">

                    <thead>

                    <tr>

                        <th>#</th>
                        <th>اليوم</th>
                        <th>الوقت</th>
                        <th>الاسم بالحجز</th>
                        <th>الهاتف</th>
                        <th>الحالة</th>
                        <th>ملاحظات</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($patient->appointments as $appointment)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $appointment->day }}</td>

                            <td>{{ $appointment->appointment_time }}</td>

                            <td>{{ $appointment->patient_name }}</td>

                            <td>{{ $appointment->patient_phone }}</td>

                            <td>
    @switch($appointment->status)

        @case('pending')
            <span class="badge badge-warning px-3 py-2">
                <i class="fas fa-clock mr-1"></i>
                قيد الانتظار
            </span>
            @break

        @case('confirmed')
            <span class="badge badge-primary px-3 py-2">
                <i class="fas fa-check mr-1"></i>
                مؤكد
            </span>
            @break

        @case('completed')
            <span class="badge badge-success px-3 py-2">
                <i class="fas fa-check-circle mr-1"></i>
                مكتمل
            </span>
            @break

        @case('cancelled')
            <span class="badge badge-danger px-3 py-2">
                <i class="fas fa-times-circle mr-1"></i>
                ملغي
            </span>
            @break

        @default
            <span class="badge badge-secondary px-3 py-2">
                غير معروف
            </span>

    @endswitch
</td>

                            <td>

                                {{ $appointment->notes ?: 'لا توجد ملاحظات' }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center">
                                لا توجد حجوزات
                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection