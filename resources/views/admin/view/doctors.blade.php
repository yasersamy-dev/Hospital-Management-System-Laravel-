@extends('adminlte::page')

@section('title', 'عرض الدكاترة')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h2 class="fw-bold">

            <i class="fas fa-user-md text-success"></i>

            إدارة الدكاترة

        </h2>

        <p class="text-muted mb-0">

            عرض وإدارة جميع الأطباء داخل المستشفى

        </p>

    </div>

    <a href="{{ route('doctors.create') }}"
       class="btn btn-success px-4">

        <i class="fas fa-user-plus me-2"></i>

        إضافة دكتور

    </a>

</div>

@stop

@section('content')

<div class="row mb-4">

    <div class="col-lg-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $totalDoctors }}</h3>

                <p>إجمالي الدكاترة</p>

            </div>

            <div class="icon">

                <i class="fas fa-user-md"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $totalSpecialties }}</h3>

                <p>عدد التخصصات</p>

            </div>

            <div class="icon">

                <i class="fas fa-stethoscope"></i>

            </div>

        </div>

    </div>

</div>


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
                        <td>
                    
                        <div class="d-flex align-items-center">
                        
                        <img
                        
                        src="https://ui-avatars.com/api/?background=28a745&color=fff&name={{ urlencode($doctor->name) }}"
                        
                        class="img-circle mr-2"
                        
                        width="45">
                        
                        <div>
                        
                        <strong>
                        
                        {{ $doctor->name }}
                        
                        </strong>
                        
                        <br>
                        
                        <small class="text-muted">
                        
                        ID : {{ $doctor->id }}
                        
                        </small>
                        
                        </div>
                        
                        </div>
                        
                        </td>
                        <td>
                            <span class="badge badge-pill badge-primary px-3 py-2">

                             <i class="fas fa-stethoscope"></i>
                             
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

.img-circle{

border:2px solid #e9ecef;

}

</style>

@stop

@stop
