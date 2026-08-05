@extends('layouts.doctor-dashboard')

@section('title', 'المرضى')

@section('content')

<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h3 class="card-title mb-0">
            <i class="fas fa-user-injured text-primary ml-2"></i>
            قائمة المرضى
        </h3>

        <form action="" method="GET" class="form-inline">
            <div class="input-group input-group-sm" style="width: 260px;">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="ابحث باسم المريض..."
                    value="{{ request('search') }}"
                >

                <div class="input-group-append">
                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>

    <div class="card-body p-0">

        <table class="table table-hover table-striped mb-0">

            <thead class="bg-light">

            <tr>
                <th width="60">#</th>
                <th>المريض</th>
                <th>البريد الإلكتروني</th>
                <th>عدد الحجوزات</th>
                <th>تاريخ التسجيل</th>
                <th width="220" class="text-center">الإجراءات</th>
            </tr>

            </thead>

            <tbody>

            @forelse($patients as $patient)

                <tr>

                    <td>
                        {{ ($patients->currentPage()-1) * $patients->perPage() + $loop->iteration }}
                    </td>

                    <td>

                        <div class="d-flex align-items-center">

                            

                            <div class="ml-3">
                                <strong>{{ $patient->name }}</strong>

                                <br>

                                <small class="text-muted">
                                    ID : {{ $patient->id }}
                                </small>
                            </div>

                        </div>

                    </td>

                    <td>{{ $patient->email }}</td>

                    <td>

                        <span class="badge badge-info px-3 py-2">
                            {{ $patient->appointments_count }}
                        </span>

                    </td>

                    <td>

                        {{ $patient->created_at->format('d M Y') }}

                    </td>

                    <td class="text-center">

                        <a href="{{ route('doctor.patients.show',$patient->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                            عرض

                        </a>

                        <a href="{{ route('chat.index',$patient->id) }}"
                           class="btn btn-success btn-sm">

                            <i class="fas fa-comment-medical"></i>

                            تواصل

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6">

                        <div class="text-center py-5">

                            <i class="fas fa-user-slash fa-3x text-muted mb-3"></i>

                            <h5 class="text-muted">
                                لا يوجد مرضى حتى الآن
                            </h5>

                            <p class="text-secondary mb-0">
                                سيظهر المرضى هنا بمجرد وجود حجوزات معك.
                            </p>

                        </div>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    @if($patients->hasPages())

        <div class="card-footer clearfix">

            {{ $patients->onEachSide(1)->links('pagination::bootstrap-4') }}

        </div>

    @endif

</div>

@endsection