@extends('adminlte::page')

@section('title', 'عرض المستخدمين')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h2 class="fw-bold">

            <i class="fas fa-users text-primary"></i>

            إدارة المستخدمين

        </h2>

        <p class="text-muted mb-0">

            عرض وإدارة جميع المستخدمين داخل النظام

        </p>

    </div>

    <a href="{{ route('users.create') }}"
       class="btn btn-primary px-4">

        <i class="fas fa-user-plus me-2"></i>

        إضافة مستخدم

    </a>

</div>

@stop

@section('content')

<div class="row mb-4">

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>إجمالي المستخدمين</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $totalAdmins }}</h3>
                <p>المديرين</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-shield"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalDoctors }}</h3>
                <p>الأطباء</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-md"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalPatients }}</h3>
                <p>المستخدمين</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">قائمة المستخدمين</h3>

        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-user-plus"></i> إضافة مستخدم
        </a>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        

   <form action="#" method="GET" class="w-50">

    <div class="input-group">

        <input
            type="text"
            name="search"
            value=""
            class="form-control"
            placeholder="ابحث بالاسم أو البريد">

        <select name="role" class="form-control">

            <option value="">كل الصلاحيات</option>

            <option value="admin" {{ request('role')=='admin'?'selected':'' }}>
                مدير
            </option>

            <option value="doctor" {{ request('role')=='doctor'?'selected':'' }}>
                طبيب
            </option>

            <option value="user" {{ request('role')=='user'?'selected':'' }}>
                مستخدم
            </option>

        </select>

        <div class="input-group-append">

            <button class="btn btn-primary">

                <i class="fas fa-search"></i>

            </button>

        </div>

    </div>

</form>
    
    <div>

    <button class="btn btn-outline-secondary">
    
    <i class="fas fa-filter"></i>
    
    فلترة
    
    </button>
    
    <button class="btn btn-outline-success">
    
    <i class="fas fa-file-export"></i>
    
    Export
    
    </button>
    
    </div>
    
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الصلاحية</th>
                    {{-- <th>تاريخ الإنشاء</th> --}}
                    <th class="text-center">الإجراءات</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                       <td>

                        <div class="d-flex align-items-center">
                        
                            <img
                                src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                                width="40"
                                class="img-circle mr-2">
                        
                            <div>
                        
                                <strong>{{ $user->name }}</strong>
                        
                                <br>
                        
                                <small class="text-muted">
                        
                                    #{{ $user->id }}
                        
                                </small>
                        
                            </div>
                        
                        </div>
                        
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                          @if($user->role=='admin')

                            <span class="badge badge-danger px-3 py-2">
                            <i class="fas fa-user-shield"></i>
                             مدير
                            </span>
                            
                            @elseif($user->role=='doctor')
                            
                            <span class="badge badge-info px-3 py-2">
                            <i class="fas fa-user-md"></i>
                                طبيب
                            </span>
                            
                            @else
                            
                            <span class="badge badge-success px-3 py-2">
                            <i class="fas fa-user"></i>
                                مستخدم
                            </span>
                            
                        @endif

                        </td>
                        
                      
                        <td class="text-center">
                            
                           <div class="btn-group">

                              <button class="btn btn-sm btn-light dropdown-toggle"
                                      data-toggle="dropdown">
                              
                              الإجراءات
                              
                              </button>
                              
                              <div class="dropdown-menu dropdown-menu-right">
                              
                              <a class="dropdown-item"
                                 href="{{ route('users.show',$user) }}">
                              
                              <i class="fas fa-eye text-info"></i>
                              
                              عرض
                              
                              </a>
                              
                              <a class="dropdown-item"
                                 href="{{ route('users.edit',$user) }}">
                              
                              <i class="fas fa-edit text-warning"></i>
                              
                              تعديل
                              
                              </a>
                              
                              <div class="dropdown-divider"></div>
                              
                              <button class="dropdown-item text-danger">
                              
                              <i class="fas fa-trash"></i>
                              
                              حذف
                              
                              </button>
                              
                              </div>
                              
                              </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            لا يوجد مستخدمين
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@stop
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
