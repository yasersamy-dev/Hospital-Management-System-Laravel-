<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Cairo Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/doctor_dashboard/doctor-dashboard.css') }}">

    @stack('styles')
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

        <a href="{{ route('doctor.appointments.index') }}" class="sidebar-link">
            <i class="bi bi-calendar-check"></i>
            الحجوزات
        </a>

        <a href="{{ route('doctor.patients.index')}}" class="sidebar-link">
            <i class="bi bi-people"></i>
            المرضى
        </a>

        <a href="{{route('chat.index')}}" class="sidebar-link">
            <i class="bi bi-chat-dots"></i>
            الرسائل
        </a>

        @php
            $unreadCount = auth()->user()->unreadNotifications()->count();
        @endphp

        <a href="{{ route('doctor.notifications.index') }}" class="sidebar-link position-relative">

            <i class="bi bi-bell"></i>
        
            @if($unreadCount)
                <span class="notification-badge">
                    {{ $unreadCount }}
                </span>
            @endif
        
            الإشعارات
        
        </a>

        

        <a href="{{ route('doctor.profile')}}" class="sidebar-link">
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

<main class="main-content">
    @yield('content')
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

const menu=document.getElementById("menuToggle");
const sidebar=document.querySelector(".sidebar");

menu.addEventListener("click",()=>{

sidebar.classList.toggle("show");

});

</script>
</body>
</html>