@extends('adminlte::page')

@section('title', 'التخصصات')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h2 class="fw-bold">

            <i class="fas fa-stethoscope text-primary"></i>

            إدارة التخصصات

        </h2>

        <p class="text-muted mb-0">

            عرض وإدارة جميع التخصصات الطبية

        </p>

    </div>

    <a href="{{ route('specialties.create') }}"
       class="btn btn-primary px-4">

        <i class="fas fa-plus-circle me-2"></i>

        إضافة تخصص

    </a>

</div>

@stop

@section('content')

<div class="row mb-4">

<div class="col-md-6">

<div class="small-box bg-primary">

<div class="inner">

<h3>{{ $totalSpecialties }}</h3>

<p>إجمالي التخصصات</p>

</div>

<div class="icon">

<i class="fas fa-stethoscope"></i>

</div>

</div>

</div>

<div class="col-md-6">

<div class="small-box bg-success">

<div class="inner">

<h3>{{ $totalDoctors }}</h3>

<p>إجمالي الأطباء</p>

</div>

<div class="icon">

<i class="fas fa-user-md"></i>

</div>

</div>

</div>

</div>

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

@section('css')

<style>

.table tbody tr{

transition:.3s;

}

.table tbody tr:hover{

background:#f8f9fa;

transform:scale(1.01);

}

.badge{

font-size:13px;

}

</style>

@stop

@stop
