@extends('layouts.doctor-dashboard')
@section('content')



    <!-- TOPBAR -->

    <div class="topbar">

        <div class="search-box">

            <input type="text"
                   placeholder="ابحث عن مريض...">

            <i class="bi bi-search"></i>

        </div>

        <div class="topbar-actions">

            <div class="top-icon">

                <i class="bi bi-chat-dots"></i>

                <span class="notification-badge">
                    4
                </span>

            </div>

            @php
                $unreadCount = auth()->user()->unreadNotifications()->count();
            @endphp
            <div class="top-icon position-relative">

                <a href="{{ route('doctor.notifications.index') }}">
                    <i class="bi bi-bell"></i>
                </a>
            
                @if($unreadCount)
                    <span class="notification-badge">
                        {{ $unreadCount }}
                    </span>
                @endif
            
            </div>
            <div class="top-icon">
               <a href="{{ route('doctor.profile') }}"><i class="bi bi-person"></i></a> 
            </div>

        </div>

    </div>

    <!-- STATS -->

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon">
                <i class="bi bi-calendar2-check"></i>
            </div>

            <h3>
                {{ $appointments->count() }}
            </h3>

            <p>
                إجمالي الحجوزات
            </p>

        </div>

        <div class="stat-card">

            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>

            <h3>
                {{ $completedAppointments }}
            </h3>

            <p>
                حجوزات مكتملة
            </p>

        </div>

        <div class="stat-card">

            <div class="stat-icon">
                <i class="bi bi-clock-history"></i>
            </div>

            <h3>
                {{ $pendingAppointments }}
            </h3>

            <p>
                قيد الانتظار
            </p>

        </div>
        <div class="stat-card">

            <div class="stat-icon">
                <i class="bi bi-clock-history"></i>
            </div>

            <h3>
                {{ $cancelledAppointments }}
            </h3>

            <p>
                ملغية
            </p>

        </div>
        <div class="stat-card">

            <div class="stat-icon">
                <i class="bi bi-clock-history"></i>
            </div>

            <h3>
                {{ $confirmedAppointments }}
            </h3>

            <p>
                مقبولة
            </p>

        </div>

    </div>

    <!-- CONTENT -->

    <div class="content-grid">

        <!-- APPOINTMENTS -->

        <div class="dashboard-card">

            <div class="card-title-flex">

                <h4>
                    آخر الحجوزات
                </h4>

                <a href="#"
                   class="btn btn-primary rounded-pill px-4">

                    عرض الكل

                </a>

            </div>

            @if($appointments->count())

                <div class="table-responsive">

                    <table class="table">

                        <thead>

                        <tr>

                            <th>
                                المريض
                            </th>

                            <th>
                                التاريخ
                            </th>

                            <th>
                                الوقت
                            </th>

                            <th>
                                الحالة
                            </th>

                            <th>
                                الإجراءات
                            </th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach($appointments as $appointment)

                            <tr>

                                <td>

                                    <div class="patient-box">

                                        <img src="https://ui-avatars.com/api/?name={{ $appointment->patient_name }}&background=random">

                                        <div>

                                            <strong>
                                                {{ $appointment->patient_name }}
                                            </strong>

                                        </div>

                                    </div>

                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->translatedFormat('d M Y') }}
                                </td>

                                <td>
                                    {{ $appointment->appointment_time }}
                                </td>

                                <td>

                                    @if($appointment->status == 'pending')

                                        <span class="custom-badge pending">
                                            قيد الانتظار
                                        </span>

                                    @elseif($appointment->status == 'confirmed')

                                        <span class="custom-badge confirmed">
                                            مقبول
                                        </span>

                                    @elseif($appointment->status == 'completed')

                                        <span class="custom-badge completed">
                                            مكتمل
                                        </span>

                                    @else

                                        <span class="custom-badge cancelled">
                                            ملغي
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="dropdown">

                                        <button class="btn btn-light rounded-pill"
                                                data-bs-toggle="dropdown">

                                            <i class="bi bi-three-dots"></i>

                                        </button>

                                        <ul class="dropdown-menu">

                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    فتح المحادثة
                                                </a>
                                            </li>

                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    عرض التفاصيل
                                                </a>
                                            </li>

                                        </ul>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            @endif

        </div>

        <!-- PROFILE -->

        <div class="dashboard-card doctor-profile-card">

            <img src="{{ asset($user->doctor?->image ?? 'default-doctor.jpg') }}">

            <h4>
                د /
                {{ $user->doctor?->name }}
            </h4>

            <p>
                {{ $user->doctor?->specialty?->name }}
            </p>

            <div class="doctor-info">

                <div class="doctor-info-item">

                    <span>
                        الهاتف
                    </span>

                    <strong>
                        {{ $user->doctor?->phone }}
                    </strong>

                </div>

                <div class="doctor-info-item">

                    <span>
                        العنوان
                    </span>

                    <strong>
                        {{ $user->doctor?->address }}
                    </strong>

                </div>

                <div class="doctor-info-item">

                    <span>
                        عدد المرضى
                    </span>

                    <strong>
                        124
                    </strong>

                </div>

                <div class="doctor-info-item">

                    <span>
                        التقييم
                    </span>

                    <strong>
                        ⭐ 4.9
                    </strong>

                </div>

            </div>

        </div>

    </div>



@endsection