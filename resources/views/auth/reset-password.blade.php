@extends('layouts.auth')

@section('title', 'إعادة تعيين كلمة السر')

@section('content')

<section class="d-flex justify-content-center align-items-center">

    <div class="card auth-card p-4" style="width:100%; max-width:430px;">

        <div class="text-center mb-4">

            <div class="mb-3">
                <i class="fa-solid fa-lock text-success fs-1"></i>
            </div>

            <h3 class="auth-title">
                إعادة تعيين كلمة السر
            </h3>

            <p class="text-muted small">
                أدخل كلمة السر الجديدة الخاصة بك
            </p>

        </div>

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

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            {{-- Password --}}
            <div class="mb-3">

                <label class="form-label">
                    كلمة السر الجديدة
                </label>

                <div class="input-group">

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

            {{-- Confirm Password --}}
            <div class="mb-4">

                <label class="form-label">
                    تأكيد كلمة السر
                </label>

                <div class="input-group">

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

            <button class="btn btn-success btn-custom w-100">
                <i class="fa-solid fa-check me-2"></i>
                تغيير كلمة السر
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