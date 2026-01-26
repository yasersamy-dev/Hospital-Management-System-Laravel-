@extends('layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')
<section class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card shadow-lg p-4 rounded-4" style="width: 100%; max-width: 400px;">
    <h3 class="text-center mb-4 fw-bold">تسجيل الدخول</h3>

    <form action="{{ route('login') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">البريد الإلكتروني</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>

      <div class="mb-2">
        <label for="password" class="form-label">كلمة المرور</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>

      <!-- هل نسيت كلمة السر -->
      <div class="mb-3 text-end">
        <a href="{{ route('password.forgot')}}" class="text-decoration-none small">
          هل نسيت كلمة السر؟
        </a>
      </div>

      <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>
    </form>

    <p class="text-center mt-3 mb-0">
      ليس لديك حساب؟
      <a href="{{ route('auth.showregisterform') }}" class="text-decoration-none fw-semibold">
        أنشئ حسابًا الآن
      </a>
    </p>
  </div>
</section>
@endsection
