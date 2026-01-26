<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
  <div class="container">

    <a class="navbar-brand fw-bold fs-4 text-primary" href="{{ route('home.index')}}">
      مستشفى الوكيل
    </a>

    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="mainNav">
      
      <ul class="navbar-nav mb-2 mb-lg-0 text-center">

        <li class="nav-item">
          <a class="nav-link" href="{{ route('home.index')}}">الرئيسية</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"
             href="#"
             data-bs-toggle="dropdown">
            التخصصات
          </a>
          <ul class="dropdown-menu text-end">
            @foreach(\App\Models\Specialty::all() as $specialty)
              <li>
                <a class="dropdown-item text-end"
              
                   href="{{ route('specialties.show', $specialty->id) }}">
                  {{ $specialty->name }}
                </a>
              </li>
            @endforeach
          </ul>
        </li>

        
        <li class="nav-item">
          <a class="nav-link" href="{{  route('contact.show')}}">تواصل معنا</a>
        </li>

       
        @guest
        <li class="nav-item d-lg-none mt-2">
          <a class="nav-link fw-bold text-primary text-center"
             href="{{ route('auth.showloginform') }}">
            تسجيل دخول
          </a>
        </li>
        @endguest

      </ul>
    </div>

@auth
<div class="dropdown me-3">
    <a class="btn position-relative" data-bs-toggle="dropdown">
        <i class="fa-solid fa-bell fs-3"></i>
        <span class="notification-badge"></span>
    </a>

    <ul class="dropdown-menu dropdown-menu-end p-2" style="width:280px">

        @forelse(auth()->user()->unreadNotifications as $notification)
            <li>
                <a class="dropdown-item d-flex justify-content-between align-items-center"
                   href="{{ route('profile.show', $notification->data['doctor_id']) }}">
                    <span>{{ $notification->data['message'] }}</span>
                    <small class="text-muted">
                        {{ $notification->created_at->diffForHumans() }}
                    </small>
                </a>
            </li>
        @empty
            <li class="dropdown-item text-center text-muted">
                لا توجد إشعارات جديدة
            </li>
        @endforelse

    </ul>
</div>
@endauth




    
    @guest
    <div class="d-none d-lg-block me-2">
      <a href="{{ route('auth.showloginform') }}"
         class="btn btn-primary rounded-pill px-4">
        تسجيل دخول
      </a>
    </div>
    @endguest

    @auth
    <div class="d-none d-lg-block me-2 dropdown">
      <button class="btn btn-outline-success dropdown-toggle rounded-pill px-4"
              data-bs-toggle="dropdown">
        <i class="bi bi-person-circle me-1"></i>
        {{ Auth::user()->name }}
      </button>
      <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="{{ route('profile.show')}}">حسابي</a></li>
        <li>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="dropdown-item">تسجيل الخروج</button>
          </form>
        </li>
      </ul>
    </div>
    @endauth

  </div>
</nav>