@extends('layouts.doctor-dashboard')

@section('title','الإشعارات')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
@endpush

@section('content')

<div class="dashboard-card">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4>الإشعارات</h4>

        <div class="btn-group">

            <a href="{{ route('doctor.notifications.index') }}"
               class="btn {{ request('type') == null ? 'btn-primary' : 'btn-outline-primary' }}">
                الكل
            </a>
            
            <a href="{{ route('doctor.notifications.index',['type'=>'unread']) }}"
               class="btn {{ request('type') == 'unread' ? 'btn-warning' : 'btn-outline-warning' }}">
                غير مقروءة
            </a>
            
            <a href="{{ route('doctor.notifications.index',['type'=>'read']) }}"
               class="btn {{ request('type') == 'read' ? 'btn-success' : 'btn-outline-success' }}">
                مقروءة
            </a>

        </div>

    </div>

@forelse($notifications as $notification)

<div class="notification-card mb-3 p-3 rounded-4
    {{ is_null($notification->read_at) ? 'unread' : '' }}">

    <div class="d-flex justify-content-between align-items-start">

        <div class="d-flex">

            <div class="notification-icon me-3">
                <i class="bi bi-bell-fill"></i>
            </div>

            <div>

                <h6 class="mb-1 fw-bold">
                    {{ $notification->data['message'] ?? 'إشعار جديد' }}
                </h6>

                <small class="text-muted">
                    <i class="bi bi-clock"></i>
                    {{ $notification->created_at->diffForHumans() }}
                </small>

            </div>

        </div>

        <div>

            @if(is_null($notification->read_at))

                <form method="POST"
                      action="{{ route('doctor.notifications.markAsRead',$notification->id) }}">
                    @csrf
                    @method('PATCH')

                    <button class="btn btn-sm btn-primary rounded-pill">
                        <i class="bi bi-check-circle"></i>
                        تعليم كمقروء
                    </button>
                </form>

            @else

                <span class="badge bg-success rounded-pill px-3 py-2">
                    <i class="bi bi-check2-all"></i>
                    مقروء
                </span>

            @endif

        </div>

    </div>

</div>

@empty

<div class="text-center py-5">
    <i class="bi bi-bell-slash fs-1 text-muted"></i>
    <p class="mt-3 text-muted">
        لا يوجد إشعارات حالياً
    </p>
</div>

@endforelse

    <div class="mt-3">
        {{ $notifications->links() }}
    </div>

</div>

@endsection