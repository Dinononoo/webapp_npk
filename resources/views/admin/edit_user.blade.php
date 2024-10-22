@extends('layout.app')

@section('title', 'แก้ไขผู้ใช้')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white rounded-top border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #4b6cb7, #182848);">
            <h5 class="mb-0">แก้ไขผู้ใช้</h5>
            <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-sm d-flex align-items-center">
                <i class="fas fa-arrow-left me-2"></i> ย้อนกลับ
            </a>
        </div>
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน</label>
                    <div class="input-group password-group">
                        <input type="password" class="form-control password-field" id="password" name="password" value="{{ old('password', $user->plain_password) }}">
                        <button class="btn btn-outline-secondary toggle-password" type="button" onclick="togglePassword('password', 'togglePasswordIcon')">
                            <i id="togglePasswordIcon" class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">ยืนยันรหัสผ่าน</label>
                    <div class="input-group password-group">
                        <input type="password" class="form-control password-field" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation', $user->plain_password) }}">
                        <button class="btn btn-outline-secondary toggle-password" type="button" onclick="togglePassword('password_confirmation', 'togglePasswordConfirmationIcon')">
                            <i id="togglePasswordConfirmationIcon" class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-flex align-items-center">
                    <i class="fas fa-save me-2"></i> บันทึก
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword(fieldId, iconId) {
        var field = document.getElementById(fieldId);
        var icon = document.getElementById(iconId);
        if (field.type === "password") {
            field.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            field.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

<!-- Add Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    .card {
        border: none;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background: linear-gradient(135deg, #4b6cb7, #182848);
        border-bottom: 0;
        border-radius: 1rem 1rem 0 0;
        padding: 1rem 1.5rem;
    }
    .btn {
        display: flex;
        align-items: center;
        transition: background-color 0.3s ease, transform 0.3s ease;
        border-radius: 0.25rem;
        padding: 0.5rem 1rem;
    }
    .btn i {
        margin-right: 0.5rem;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .password-group {
        position: relative;
    }
    .password-group .password-field {
        border-radius: 0.25rem 0 0 0.25rem;
        padding-right: 2.5rem;
    }
    .password-group .toggle-password {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        background: none;
        border: none;
        padding: 0 10px;
        display: flex;
        align-items: center;
        cursor: pointer;
    }
    .password-group .toggle-password i {
        color: #333;
    }
    .password-group .toggle-password:focus {
        outline: none;
    }
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb;
    }
    .btn-close {
        color: #721c24;
    }
    .form-control {
        border-radius: 0.25rem;
    }
</style>
@endsection
