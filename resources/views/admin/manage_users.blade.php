@extends('layout.app')

@section('title', 'จัดการผู้ใช้')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center text-white rounded-top border-0" style="background: linear-gradient(135deg, #4b6cb7, #182848);">
            <h5 class="mb-0">จัดการผู้ใช้</h5>
            <a href="{{ route('admin.users.create') }}" class="btn btn-light btn-sm">
                <i class="fas fa-plus"></i> เพิ่มผู้ใช้
            </a>
        </div>
        <div class="card-body p-4">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อ</th>
                            <th>อีเมล</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>รหัสผ่าน</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $rowNumber = ($users->currentPage() - 1) * $users->perPage() + 1; @endphp
                        @foreach($users as $user)
                        @if($user->role != 'admin') <!-- เช็คสถานะของ user -->
                        <tr>
                            <td>{{ $rowNumber++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <div class="input-group password-group">
                                    <input type="password" class="form-control password-field" id="password-{{ $user->id }}" value="{{ $user->plain_password }}" readonly>
                                    <button class="btn btn-outline-secondary toggle-password" type="button" onclick="togglePassword('password-{{ $user->id }}', 'togglePasswordIcon-{{ $user->id }}')">
                                        <i id="togglePasswordIcon-{{ $user->id }}" class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm d-flex align-items-center me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            @php
            // กรองผู้ใช้ที่ไม่ใช่ admin
            $filteredUsers = $users->filter(function ($user) {
                return $user->role != 'admin';
            });

            // คำนวณลำดับการแสดงผลของผู้ใช้ที่ไม่ใช่ admin
            $firstItem = ($users->currentPage() - 1) * $users->perPage() + 1;
            $lastItem = $firstItem + $filteredUsers->count() - 1;
            @endphp

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="dataTables_info">
                    แสดงผล {{ $firstItem }} ถึง {{ $lastItem }} จากทั้งหมด {{ $filteredUsers->count() }} รายการ
                </div>
                <div>
                    {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
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
    .container {
        max-width: 1200px;
    }

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

    .table thead {
        background-color: #e9ecef;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
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
        max-width: 200px;
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

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    .btn-close {
        color: #155724;
    }

    .form-control {
        border-radius: 0.25rem;
    }

    .d-flex .btn {
        margin-right: 0.5rem;
    }

    .d-flex .btn:last-child {
        margin-right: 0;
    }

    .dataTables_info {
        font-size: 0.875rem;
        color: #6c757d;
    }

    .pagination {
        margin: 0;
    }

    .pagination .page-link {
        color: #4b6cb7;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .pagination .page-item.active .page-link {
        background-color: #4b6cb7;
        border-color: #4b6cb7;
    }

    .pagination .page-link:hover {
        background-color: #e9ecef;
        color: #4b6cb7;
    }

    @media (max-width: 768px) {
        .card-header {
            font-size: 1.5rem;
            padding: 0.75rem 1rem;
        }

        .btn-custom {
            width: 80px;
        }

        .btn-custom-select {
            width: 100px;
        }

        .btn-custom-delete {
            width: 30px;
        }

        .table-responsive {
            margin-bottom: 2rem;
        }

        .dataTables_info {
            font-size: 0.75rem;
        }

        .pagination .page-link {
            font-size: 0.75rem;
        }
    }
</style>
@endsection
