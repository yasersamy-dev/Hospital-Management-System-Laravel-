@extends('layouts.app')
@section('title')@endsection
@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold">تواصل معنا</h2>
        <p class="text-muted">
            نحن هنا لمساعدتك، لا تتردد في التواصل معنا
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3 fs-4">📍</div>
                                <div>
                                    <h6 class="fw-bold mb-1">العنوان</h6>
                                    <p class="text-muted mb-0">
                                        القاهرة – مصر
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3 fs-4">📞</div>
                                <div>
                                    <h6 class="fw-bold mb-1">رقم الهاتف</h6>
                                    <p class="text-muted mb-0">
                                        +20 100 000 0000
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3 fs-4">✉️</div>
                                <div>
                                    <h6 class="fw-bold mb-1">البريد الإلكتروني</h6>
                                    <p class="text-muted mb-0">
                                        support@example.com
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3 fs-4">🕒</div>
                                <div>
                                    <h6 class="fw-bold mb-1">مواعيد العمل</h6>
                                    <p class="text-muted mb-0">
                                        السبت – الخميس<br>
                                        9:00 ص : 6:00 م
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection