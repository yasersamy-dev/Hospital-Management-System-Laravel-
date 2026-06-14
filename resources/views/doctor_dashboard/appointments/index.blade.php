@extends('layouts.doctor-dashboard')

@section('title','الحجوزات')

@section('content')

<div class="topbar">

    <h3>
        إدارة الحجوزات
    </h3>

</div>

<div class="dashboard-card">

    <div class="d-flex gap-2 flex-wrap mb-4">

        <a href="{{ route('doctor.appointments.index') }}"
           class="btn {{ request('status') ? 'btn-outline-primary' : 'btn-primary' }}">
            الكل
        </a>

        <a href="{{ route('doctor.appointments.index',['status'=>'pending']) }}"
           class="btn {{ request('status') == 'pending' ? 'btn-primary' : 'btn-outline-primary' }}">
            قيد الانتظار
        </a>

        <a href="{{ route('doctor.appointments.index',['status'=>'confirmed']) }}"
           class="btn {{ request('status') == 'confirmed' ? 'btn-primary' : 'btn-outline-primary' }}">
            مقبول
        </a>

        <a href="{{ route('doctor.appointments.index',['status'=>'completed']) }}"
           class="btn {{ request('status') == 'completed' ? 'btn-primary' : 'btn-outline-primary' }}">
            مكتمل
        </a>

        <a href="{{ route('doctor.appointments.index',['status'=>'cancelled']) }}"
           class="btn {{ request('status') == 'cancelled' ? 'btn-primary' : 'btn-outline-primary' }}">
            ملغي
        </a>

    </div>

    <div class="table-responsive">

        <table class="table align-middle">

            <thead>

            <tr>
                <th>المريض</th>
                <th>الهاتف</th>
                <th>الوقت</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>

            </thead>

            <tbody>

            @forelse($appointments as $appointment)

                <tr>

                    <td>
                        {{ $appointment->patient_name }}
                    </td>

                    <td>
                        {{ $appointment->patient_phone }}
                    </td>

                    <td>
                        {{ $appointment->appointment_time }}
                    </td>

                    <td>

                        @if($appointment->status == 'pending')
                            <span class="badge bg-warning">
                                انتظار
                            </span>

                        @elseif($appointment->status == 'confirmed')
                            <span class="badge bg-primary">
                                مقبول
                            </span>

                        @elseif($appointment->status == 'completed')
                            <span class="badge bg-success">
                                مكتمل
                            </span>

                        @else
                            <span class="badge bg-danger">
                                ملغي
                            </span>
                        @endif

                    </td>

                    <td>

                        <form method="POST"
                              action="{{ route('doctor.appointments.update',$appointment) }}">

                            @csrf
                            @method('PATCH')

                            <select name="status"
                                    class="form-select mb-2">

                                <option value="pending"
                                    @selected($appointment->status == 'pending')>
                                    انتظار
                                </option>

                                <option value="confirmed"
                                    @selected($appointment->status == 'confirmed')>
                                    مقبول
                                </option>

                                <option value="completed"
                                    @selected($appointment->status == 'completed')>
                                    مكتمل
                                </option>

                                <option value="cancelled"
                                    @selected($appointment->status == 'cancelled')>
                                    ملغي
                                </option>

                            </select>

                            <button class="btn btn-success btn-sm">
                                حفظ
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="text-center">
                        لا توجد حجوزات
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-3">
        {{ $appointments->withQueryString()->links() }}
    </div>

</div>

@endsection