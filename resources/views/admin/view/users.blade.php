@extends('adminlte::page')

@section('title', 'عرض المستخدمين')

@section('content_header')
    <h1>المستخدمين</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">قائمة المستخدمين</h3>

        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-user-plus"></i> إضافة مستخدم
        </a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الصلاحية</th>
                    <th>تاريخ الإنشاء</th>
                    <th class="text-center">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          @if($user->role == 'admin')
                             <span class="badge badge-danger">أدمن</span>
                         
                         @elseif($user->role == 'doctor')
                             <span class="badge badge-secondary">دكتور</span>
                         
                         @else
                             <span class="badge badge-primary">مستخدم</span>
                         @endif

                        </td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="text-center">
                            
                           <a href="{{ route('users.edit', $user->id) }}"
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                         <form action="{{ route('users.destroy', $user->id) }}"
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
                            لا يوجد مستخدمين
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@stop
