@extends('layouts.auth')

@section('title', 'نسيت كلمة السر')

@section('content')

<section class="d-flex justify-content-center align-items-center">

    <div class="card auth-card p-4" style="width:100%; max-width:430px;">

        <div class="text-center mb-4">

            <div class="mb-3">
                <i class="fa-solid fa-key text-primary fs-1"></i>
            </div>

            <h3 class="auth-title">
                نسيت كلمة السر؟
            </h3>

            <p class="text-muted small">
                أدخل بريدك الإلكتروني وسنرسل لك رابط إعادة التعيين
            </p>

        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success rounded-3">
                {{ session('success') }}
            </div>
        @endif

        {{-- Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">

                <label class="form-label">
                    البريد الإلكتروني
                </label>

                <div class="input-group">

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

            <button class="btn btn-primary btn-custom w-100">
                <i class="fa-solid fa-paper-plane me-2"></i>
                إرسال رابط التعيين
            </button>

        </form>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}"
               class="text-decoration-none fw-semibold">
                العودة لتسجيل الدخول
            </a>
        </div>

    </div>

</section>

@endsection
