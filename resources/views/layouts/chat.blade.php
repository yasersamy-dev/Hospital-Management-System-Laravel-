@php
    $layout = 'layouts.app';

    if (auth()->check()) {

        if (auth()->user()->role === 'admin') {
            $layout = 'adminlte::page';
        } elseif (auth()->user()->role === 'doctor') {
            $layout = 'layouts.doctor-dashboard';
        }

    }
@endphp

@extends($layout)

@stack('style')

@section('title', 'الدردشة')


@section('content')
    <div class="container-fluid py-3">
        @yield('chat-content')
    </div>
@endsection