@extends('adminlte::page')

@section('title', 'إضافة مستخدم جديد')

<style>
    .form-control {
        background-color: #fff !important;
        color: #000 !important;
    }

    .form-control::placeholder {
        color: #6c757d;
    }
    .form-control {
    border-radius: 6px;
    padding: 10px 12px;
}

</style>


@section('content_header')
    <h1>إضافة مستخدم جديد</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">بيانات المستخدم</h3>
            </div>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="card-body">

                    
                    <div class="form-group">
                        <label>الاسم</label>
                        <input type="text" 
                               name="name" 
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}"
                               placeholder="ادخل اسم المستخدم">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input type="email" 
                               name="email" 
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}"
                               placeholder="example@email.com">
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label>كلمة المرور</label>
                        <input type="password" 
                               name="password" 
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="********">
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label>تأكيد كلمة المرور</label>
                        <input type="password" 
                               name="password_confirmation" 
                               class="form-control"
                               placeholder="********">
                    </div>

                    
                    <div class="form-group">
                        <label>الصلاحية</label>
                        <select name="admin" class="form-control">
                            <option value="0">مستخدم عادي</option>
                            <option value="1">أدمن</option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> حفظ
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        رجوع
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
@stop
