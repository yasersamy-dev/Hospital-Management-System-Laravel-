@extends('adminlte::page')

@section('title', 'عرض المرضى')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h2 class="fw-bold">

            <i class="fas fa-user-injured text-primary"></i>

            إدارة المرضى

        </h2>

        <p class="text-muted mb-0">

            عرض جميع المرضى وعدد الحجوزات الخاصة بهم

        </p>

    </div>

</div>

@stop

@section('content')


<div class="row mb-4">

    <div class="col-md-6">

        <div class="small-box bg-primary">

            <div class="inner">

                <h3>{{ $totalPatients }}</h3>

                <p>إجمالي المرضى</p>

            </div>

            <div class="icon">

                <i class="fas fa-user-injured"></i>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $totalAppointments }}</h3>

                <p>إجمالي الحجوزات</p>

            </div>

            <div class="icon">

                <i class="fas fa-calendar-check"></i>

            </div>

        </div>

    </div>

</div>

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
                    <td>
                    
                    <div class="d-flex align-items-center">
                    
                    <img
                    
                    src="https://ui-avatars.com/api/?background=0d6efd&color=fff&name={{ urlencode($patient->name) }}"
                    
                    width="45"
                    
                    class="img-circle mr-2">
                    
                    <div>
                    
                    <strong>
                    
                    {{ $patient->name }}
                    
                    </strong>
                    
                    <br>
                    
                    <small class="text-muted">
                    
                    ID : {{ $patient->id }}
                    
                    </small>
                    
                    </div>
                    
                    </div>
                    
                    </td>
                    <td>{{ $patient->email }}</td>
                    <td>
                        <span class="badge badge-success px-3 py-2">

                        <i class="fas fa-calendar-check"></i>
                        
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

@section('css')

<style>

.table tbody tr{

transition:.3s;

}

.table tbody tr:hover{

background:#f8f9fa;

transform:scale(1.01);

}

.img-circle{

border:2px solid #eee;

}

.badge{

font-size:13px;

}

</style>

@stop

@stop
