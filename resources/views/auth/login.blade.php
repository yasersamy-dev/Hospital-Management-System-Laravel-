@extends('layouts.auth')

@section('title', 'تسجيل الدخول')

@section('content')

<section class="auth-section d-flex justify-content-center align-items-center">

    <div class="card auth-card p-4 p-lg-5">

        <div class="text-center mb-4">

            <div class="logo-circle mx-auto mb-3">
                <i class="fa-solid fa-user-doctor"></i>
            </div>

            <h2 class="auth-title">
                مرحبًا بعودتك
            </h2>

            <p class="auth-subtitle">
                قم بتسجيل الدخول للوصول إلى حسابك
            </p>

        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">
                    البريد الإلكتروني
                </label>

                <div class="input-group custom-input">

                    <span class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                    </span>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="example@gmail.com"
                        required
                    >

                </div>
            </div>

            <div class="mb-2">
                <label class="form-label">
                    كلمة المرور
                </label>

                <div class="input-group custom-input">

                    <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                    </span>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="********"
                        required
                    >

                </div>
            </div>

            <div class="d-flex justify-content-end mb-4">
                <a href="{{ route('password.forgot') }}"
                   class="forgot-link">
                    هل نسيت كلمة المرور؟
                </a>
            </div>

            <button type="submit"
                    class="btn btn-primary btn-auth w-100">
                <i class="fa-solid fa-right-to-bracket me-2"></i>
                تسجيل الدخول
            </button>

        </form>

        <div class="divider my-4">
            <span>أو</span>
        </div>

        <div class="social-login">

            <a href="{{ route('social.redirect', ['provider' => 'google']) }}"
               class="btn social-btn google-btn w-100 mb-3">

                <i class="fab fa-google"></i>

                <span>
                    المتابعة باستخدام Google
                </span>

            </a>

            <a href="{{ route('social.redirect', ['provider' => 'facebook']) }}"
               class="btn social-btn facebook-btn w-100">

                <i class="fab fa-facebook-f"></i>

                <span>
                    المتابعة باستخدام Facebook
                </span>

            </a>

        </div>

        <div class="text-center mt-4">

            <span class="text-muted">
                ليس لديك حساب؟
            </span>

            <a href="{{ route('auth.showregisterform') }}"
               class="register-link">
                إنشاء حساب جديد
            </a>

        </div>

    </div>

</section>

@endsection