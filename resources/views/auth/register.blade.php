@extends('layouts.auth')

@section('title', 'إنشاء حساب')

@section('content')

<section class="auth-section d-flex justify-content-center align-items-center">

    <div class="card auth-card p-4 p-lg-5">

        <div class="text-center mb-4">

            <div class="logo-circle register-circle mx-auto mb-3">
                <i class="fa-solid fa-user-plus"></i>
            </div>

            <h2 class="auth-title register-title">
                إنشاء حساب جديد
            </h2>

            <p class="auth-subtitle">
                قم بإنشاء حساب للبدء في استخدام النظام
            </p>

        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">

                <label class="form-label">
                    الاسم الكامل
                </label>

                <div class="input-group custom-input">

                    <span class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                    </span>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="أدخل اسمك الكامل"
                        required
                    >

                </div>

            </div>

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

            <div class="mb-3">

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

            <div class="mb-4">

                <label class="form-label">
                    تأكيد كلمة المرور
                </label>

                <div class="input-group custom-input">

                    <span class="input-group-text">
                        <i class="fa-solid fa-shield-halved"></i>
                    </span>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="********"
                        required
                    >

                </div>

            </div>

            <button type="submit"
                    class="btn btn-success btn-auth register-btn w-100">

                <i class="fa-solid fa-user-check me-2"></i>

                إنشاء الحساب

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
                    التسجيل باستخدام Google
                </span>

            </a>

            <a href="{{ route('social.redirect', ['provider' => 'facebook']) }}"
               class="btn social-btn facebook-btn w-100">

                <i class="fab fa-facebook-f"></i>

                <span>
                    التسجيل باستخدام Facebook
                </span>

            </a>

        </div>

        <div class="text-center mt-4">

            <span class="text-muted">
                لديك حساب بالفعل؟
            </span>

            <a href="{{ route('login') }}"
               class="register-link">
                تسجيل الدخول
            </a>

        </div>

    </div>

</section>

@endsection