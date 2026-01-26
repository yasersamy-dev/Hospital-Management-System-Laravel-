@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px">
    <h4 class="mb-3">إعادة تعيين كلمة السر</h4>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="mb-3">
            <label>كلمة السر الجديدة</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>تأكيد كلمة السر</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button class="btn btn-success w-100">تغيير كلمة السر</button>
    </form>
</div>
@endsection
