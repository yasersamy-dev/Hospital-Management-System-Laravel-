@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
</head>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                الإشعارات
            </h2>

            <p class="text-muted mb-0">
                تابع آخر التحديثات والإشعارات الخاصة بحسابك
            </p>

        </div>

    </div>

    @if($notifications->isEmpty())

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center py-5">

                <i class="fa-regular fa-bell-slash fs-1 text-muted mb-4"></i>

                <h5 class="fw-bold">
                    لا توجد إشعارات
                </h5>

                <p class="text-muted mb-0">
                    ستظهر الإشعارات الجديدة هنا
                </p>

            </div>

        </div>

    @else

        <div class="notifications-wrapper">

            @foreach($notifications as $notification)

                <div class="notification-card mb-3 {{ !$notification->read_at ? 'unread' : '' }}">

                    <div class="d-flex justify-content-between align-items-start gap-3">

                        <div class="d-flex gap-3">

                            <div class="notification-avatar">

                                <i class="fa-solid fa-bell"></i>

                            </div>

                            <div>

                                <h6 class="mb-2 fw-bold">

                                    {{ $notification->data['message'] }}

                                </h6>

                                <small class="text-muted">

                                    {{ $notification->created_at->diffForHumans() }}

                                </small>

                            </div>

                        </div>

                        <div>

                            @if(!$notification->read_at)

                                <form action="{{ route('notifications.markAsRead', $notification->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button class="btn btn-sm btn-primary rounded-pill px-3">

                                        تحديد كمقروء

                                    </button>

                                </form>

                            @else

                                <span class="badge bg-success rounded-pill px-3 py-2">

                                    مقروء

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="mt-4">

            {{ $notifications->links('pagination::bootstrap-4') }}

        </div>

    @endif

</div>

@endsection