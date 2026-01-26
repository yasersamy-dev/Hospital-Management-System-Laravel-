@extends('adminlte::page')

@section('title', 'التخصصات')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>التخصصات</h1>
        <a href="{{ route('specialties.create')}}" class="btn btn-primary">
            <i class="fas fa-plus"></i> إضافة تخصص
        </a>
    </div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم التخصص</th>
                    <th>تاريخ الإضافة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($specialties as $specialty)
                    <tr>
                        <td>{{ ($specialties->currentPage() - 1) * $specialties->perPage() + $loop->iteration }}</td>
                        <td>{{ $specialty->name }}</td>
                        <td>{{ $specialty->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('specialties.edit', $specialty->id) }}"
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('specialties.destroy', $specialty->id) }}"
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
                        <td colspan="4">لا يوجد تخصصات</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        
              <div class="card-footer clearfix">
    {{ $specialties->onEachSide(1)->links('pagination::bootstrap-4') }}
       </div>
    </div>
</div>
@stop
