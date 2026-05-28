{{-- resources/views/layouts/doctor.blade.php --}}

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Cairo Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/doctor-dashboard.css') }}">

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="sidebar-logo">
        🩺 Wakeel Doctor
    </div>

    <div class="doctor-mini-profile">

        <img src="{{ asset(auth()->user()->doctor?->image ?? 'default-doctor.jpg') }}">

        <h5>
            د /
            {{ auth()->user()->doctor?->name }}
        </h5>

        <p>
            <span class="online-status"></span>
            متصل الآن
        </p>

    </div>

    <div class="sidebar-menu">

        <a href="{{ route('doctor.dashboard')}}" class="sidebar-link active">
            <i class="bi bi-grid"></i>
            الرئيسية
        </a>

        <a href="#" class="sidebar-link">
            <i class="bi bi-calendar-check"></i>
            الحجوزات
        </a>

        <a href="#" class="sidebar-link">
            <i class="bi bi-people"></i>
            المرضى
        </a>

        <a href="#" class="sidebar-link">
            <i class="bi bi-chat-dots"></i>
            الرسائل
        </a>

        <a href="#" class="sidebar-link">
            <i class="bi bi-bell"></i>
            الإشعارات
        </a>

        <a href="#" class="sidebar-link">
            <i class="bi bi-cash-stack"></i>
            الأرباح
        </a>

        <a href="#" class="sidebar-link">
            <i class="bi bi-person-circle"></i>
            الملف الشخصي
        </a>

        <a href="#" class="sidebar-link">
            <i class="bi bi-gear"></i>
            الإعدادات
        </a>

        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button class="sidebar-link border-0 bg-transparent w-100 text-start">

                <i class="bi bi-box-arrow-right"></i>
                تسجيل الخروج

            </button>

        </form>

    </div>

</div>

<!-- MAIN -->

<div class="main-content">

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

            <div class="top-icon">

                <i class="bi bi-bell"></i>

                <span class="notification-badge">
                    7
                </span>

            </div>

            <div class="top-icon">
                <i class="bi bi-person"></i>
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
                24
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
                8
            </h3>

            <p>
                قيد الانتظار
            </p>

        </div>

        <div class="stat-card">

            <div class="stat-icon">
                <i class="bi bi-cash-coin"></i>
            </div>

            <h3>
                12,500 ج
            </h3>

            <p>
                إجمالي الأرباح
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

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>