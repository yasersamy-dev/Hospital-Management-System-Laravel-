<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('doctor.dashboard') }}">
            🩺 لوحة تحكم الطبيب
        </a>

        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#doctorNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="doctorNav">
            <ul class="navbar-nav ms-auto align-items-center gap-3">

               
                <li class="nav-item text-white fw-semibold">
                    {{ auth()->user()->doctor->name }}
                </li>

                <li class="nav-item text-white-50">|</li>

                
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-light btn-sm rounded-pill px-3">
                            تسجيل خروج
                        </button>
                    </form>
                </li>

            </ul>
        </div>

    </div>
</nav>
