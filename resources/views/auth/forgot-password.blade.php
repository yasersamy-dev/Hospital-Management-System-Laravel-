@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5" style="max-width: 400px">
    <h4 class="mb-3">نسيت كلمة السر</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">إرسال رابط التعيين</button>
    </form>
</div>
@endsection
