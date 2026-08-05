<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
          rel="stylesheet">

    <link href="{{ asset('css/auth.css') }}"
          rel="stylesheet">

</head>

<body>

    <div class="background-shapes">

        <span class="shape shape1"></span>
        <span class="shape shape2"></span>
        <span class="shape shape3"></span>

    </div>

    <nav class="navbar navbar-expand-lg navbar-custom">

        <div class="container">

            <a class="navbar-brand fw-bold"
               href="{{ route('home.index') }}">

                <i class="fa-solid fa-hospital me-2"></i>

                مستشفى الطبية

            </a>

        </div>

    </nav>

    <main class="container py-5">

        @yield('content')

    </main>

    <footer>

        <div class="container text-center">

            <p>
                © جميع الحقوق محفوظة - مستشفى الوكيل 2025
            </p>

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>