<nav class="navbar navbar-expand-lg navbar-custom sticky-top">

    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <i class="fa-solid fa-hospital me-2"></i>
             مستشفى الطبية
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNav">

            <i class="fas fa-bars"></i>

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

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        الأطباء
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link book-btn" href="#">
                        احجز الآن
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
                
                                   
                <ul class="dropdown-menu specialty-dropdown text-end">
                
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

        

            {{-- Auth --}}
            @auth
            <div class="navbar-actions d-flex align-items-center gap-3">

            <a href="{{ route('chat.index') }}" class="icon-btn">
                <i class="fa-solid fa-comments"></i>
                الدردشة
            
                @if(auth()->user()->unreadMessagesCount ?? false)
                    <span class="icon-badge">
                        {{ auth()->user()->unreadMessagesCount }}
                    </span>
                @endif
            </a>

                {{-- Notifications --}}
                @php
                    $unreadNotifications = auth()->user()->unreadNotifications;
                    $unreadCount = $unreadNotifications->count();
                @endphp

                <div class="dropdown notification-dropdown">
                
                    <button class="notification-btn position-relative"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                
                        <i class="fa-solid fa-bell"></i>
                
                        @if($unreadCount > 0)
                
                            <span class="notification-count">
                                {{ $unreadCount > 99 ? '99+' : $unreadCount }}
                            </span>
                
                        @endif
                
                    </button>
                
                    <div class="dropdown-menu dropdown-menu-end notification-menu shadow border-0">
                
                        
                        <div class="notification-header d-flex justify-content-between align-items-center">
                
                            <h6 class="mb-0 fw-bold">
                                الإشعارات
                            </h6>
                
                            @if($unreadCount > 0)
                
                                <span class="badge bg-primary rounded-pill">
                                    {{ $unreadCount }} جديد
                                </span>
                
                            @endif
                
                        </div>
                
                        {{-- Notifications --}}
                        <div class="notification-body">
                
                            @forelse($unreadNotifications->take(5) as $notification)
                
                                <a href="{{ route('appointments.show', $notification->data['appointment_id']) }}"
                                   class="dropdown-item notification-item">
                
                                    <div class="d-flex align-items-start gap-3">
                
                                        <div class="notification-icon">
                
                                            <i class="fa-solid fa-calendar-check"></i>
                
                                        </div>
                
                                        <div class="flex-grow-1">
                
                                            <div class="notification-text">
                                                {{ $notification->data['message'] }}
                                            </div>
                
                                            <small class="notification-time">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </small>
                
                                        </div>
                
                                    </div>
                
                                </a>
                
                            @empty
                
                                <div class="text-center py-5 px-3">
                
                                    <i class="fa-regular fa-bell-slash fs-1 text-muted mb-3"></i>
                
                                    <p class="text-muted mb-0">
                                        لا توجد إشعارات جديدة
                                    </p>
                
                                </div>
                
                            @endforelse
                
                        </div>
                
                     
                        <div class="notification-footer">
                
                            <a href="{{ route('notifications.index') }}"
                               class="view-all-btn">
                
                                عرض جميع الإشعارات
                
                            </a>
                
                        </div>
                
                    </div>
                
                </div>

                {{-- User Dropdown --}}
                <div class="dropdown">

                    <button class="btn user-dropdown-btn dropdown-toggle" data-bs-toggle="dropdown">
                    
                        <img
                            src="{{ Auth::user()->image ? asset('storage/'.Auth::user()->image) : asset('images/avatar.png') }}"
                            class="user-avatar"
                            alt="">
                        
                        <span class="ms-2">
                            {{ Auth::user()->name }}
                        </span>
                    
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="text-center py-3">
                               <img
                                    src="{{ Auth::user()->profile_image ? asset('storage/'.Auth::user()->image) : asset('images/avatar.png') }}"
                                       class="dropdown-avatar">
                               
                                   <h6 class="mt-2 mb-0">
                                       {{ Auth::user()->name }}
                                   </h6>
                               
                                   <small class="text-muted">
                                       {{ Auth::user()->email }}
                                   </small>
                               
                               </li>
                               
                               <li><hr class="dropdown-divider"></li>

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
            </div>

            @endauth

        

    </div>

</nav>