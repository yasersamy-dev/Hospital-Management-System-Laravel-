<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layouts.css')}}">
</head>
<body class="d-flex flex-column min-vh-100">

  @if(auth()->check())
    @if(auth()->user()->doctor)
        @include('layouts.navs.doctor')
    @else
        @include('layouts.navs.user')
    @endif
    @else
    
    @include('layouts.navs.guest')

    
@endif





<main class="conditional">
    @yield('content')
</main>


<footer class="mt-auto text-white py-3" style="background:#0d6efd;">
    <div class="container text-center small">
        © جميع الحقوق محفوظة مستشفى الوكيل 2025
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('bookNowBtn').addEventListener('click', function (e) {
    e.preventDefault();

    const dropdownToggle = document.getElementById('specialtiesDropdown');

   
    const navbarCollapse = document.getElementById('mainNav');
    if (navbarCollapse && !navbarCollapse.classList.contains('show')) {
        new bootstrap.Collapse(navbarCollapse, { toggle: true });
    }

   
    const dropdown = bootstrap.Dropdown.getOrCreateInstance(dropdownToggle);
    dropdown.show();
});
</script>



</body>
</html>