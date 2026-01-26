@extends('adminlte::page')

@section('title', 'عرض الدكاترة')

@section('content_header')
    <h1>الدكاترة</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">قائمة الدكاترة</h3>

        <a href="{{ route('doctors.create') }}" class="btn btn-sm btn-success">
            <i class="fas fa-user-md"></i> إضافة دكتور
        </a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم الدكتور</th>
                    <th>التخصص</th>
                    <th>رقم الهاتف</th>
                    <th>تاريخ الإضافة</th>
                    <th class="text-center">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doctor)
                    <tr>
                       <td>{{ ($doctors->currentPage() - 1) * $doctors->perPage() + $loop->iteration }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td>
                            <span class="badge badge-info">
                                {{ $doctor->specialty->name ?? '-' }}
                            </span>
                        </td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->created_at->format('Y-m-d') }}</td>
                        <td class="text-center">
                            <a href="{{ route('doctors.edit', $doctor->id) }}"
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('doctors.destroy', $doctor->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('هل أنت متأكد؟')"
                                        class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            لا يوجد دكاترة
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
    {{ $doctors->onEachSide(1)->links('pagination::bootstrap-4') }}
</div>

</div>

@stop
