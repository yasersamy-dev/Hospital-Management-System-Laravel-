@extends('adminlte::page')

@section('title', 'عرض المرضى')

@section('content_header')
    <h1>المرضى (الحجوزات)</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">قائمة المرضى حسب الحجوزات</h3>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
       <thead>
       <tr>
           <th>#</th>
           <th>اسم المريض</th>
           <th>البريد الإلكتروني</th>
           <th>عدد الحجوزات</th>
           <th>تاريخ التسجيل</th>
       </tr>
       </thead>

            <tbody>
                @forelse($patients as $patient)
                <tr>
                    <td>{{ ($patients->currentPage() - 1) * $patients->perPage() + $loop->iteration }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>
                        <span class="badge badge-info">
                            {{ $patient->appointments_count }}
                        </span>
                    </td>
                    <td>{{ $patient->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        لا يوجد مرضى
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
       <div class="card-footer clearfix">
    {{ $patients->onEachSide(1)->links('pagination::bootstrap-4') }}

</div>
</div>

@stop
