<nav class="navbar navbar-expand-lg navbar-custom sticky-top">

    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <i class="fa-solid fa-hospital me-2"></i>
            مستشفى الوكيل
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        {{-- Navbar Links --}}
        <div class="collapse navbar-collapse justify-content-center"
             id="mainNav">

            <ul class="navbar-nav align-items-lg-center text-center">

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('home.index') }}">
                        الرئيسية
                    </a>
                </li>

                {{-- Specialties --}}
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="specialtiesDropdown"
                       data-bs-toggle="dropdown">

                        التخصصات
                    </a>

                    <ul class="dropdown-menu text-end">

                        @foreach(\App\Models\Specialty::all() as $specialty)

                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('specialties.show', $specialty->id) }}">

                                    {{ $specialty->name }}

                                </a>

                            </li>

                        @endforeach

                    </ul>

                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('contact.show') }}">
                        تواصل معنا
                    </a>
                </li>

            </ul>

        </div>

        {{-- Right Side --}}
        <div class="d-flex align-items-center gap-2">

            {{-- Guest --}}
            @guest

                <a href="{{ route('auth.showloginform') }}"
                   class="btn btn-primary px-4 py-2">

                    تسجيل الدخول

                </a>

            @endguest

            {{-- Auth --}}
            @auth

                {{-- Notifications --}}
                <div class="dropdown">

                    <button class="notification-btn"
                            data-bs-toggle="dropdown">

                        <i class="fa-solid fa-bell"></i>

                        @if(auth()->user()->unreadNotifications->count())

                            <span class="notification-badge">

                                {{ auth()->user()->unreadNotifications->count() }}

                            </span>

                        @endif

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end"
                        style="width:320px">

                        @forelse(auth()->user()->unreadNotifications as $notification)

                            <li class="mb-1">

                                <a class="dropdown-item"
                                   href="{{ route('appointments.show', $notification->data['doctor_id']) }}">

                                    <div class="fw-semibold mb-1">
                                        {{ $notification->data['message'] }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </small>

                                </a>

                            </li>

                        @empty

                            <li class="dropdown-item text-center text-muted py-3">

                                لا توجد إشعارات جديدة

                            </li>

                        @endforelse

                    </ul>

                </div>

                {{-- User Dropdown --}}
                <div class="dropdown">

                    <button class="btn btn-light border shadow-sm dropdown-toggle px-3 py-2"
                            data-bs-toggle="dropdown">

                        <i class="bi bi-person-circle me-1"></i>

                        {{ Auth::user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('profile.show') }}">

                                <i class="bi bi-person me-2"></i>
                                حسابي

                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('appointments.show') }}">

                                <i class="bi bi-calendar-check me-2"></i>
                                حجوزاتي

                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <form action="{{ route('logout') }}"
                                  method="POST">

                                @csrf

                                <button class="dropdown-item text-danger">

                                    <i class="bi bi-box-arrow-right me-2"></i>

                                    تسجيل الخروج

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            @endauth

        </div>

    </div>

</nav>