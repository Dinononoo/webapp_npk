@extends('layout.app')

@section('title', 'แก้ไขเซ็นเซอร์')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center text-white rounded-top border-0" style="background: linear-gradient(135deg, #4b6cb7, #182848);">
            <h5 class="mb-0">แก้ไขเซ็นเซอร์</h5>
            <a href="{{ route('admin.sensors.index') }}" class="btn btn-light btn-sm d-flex align-items-center">
                <i class="fas fa-arrow-left me-2"></i> ย้อนกลับ
            </a>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('admin.sensors.update', $sensor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="user_id" class="form-label">ผู้ใช้</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $sensor->user_id ? 'selected' : '' }}>{{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sensor_id" class="form-label">ID เซ็นเซอร์</label>
                    <input type="text" name="sensor_id" id="sensor_id" class="form-control" value="{{ $sensor->sensor_id }}" required>
                </div>
                <button type="submit" class="btn btn-primary d-flex align-items-center">
                    <i class="fas fa-save me-2"></i> อัพเดตเซ็นเซอร์
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Add Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    .container {
        max-width: 800px;
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
    .form-control {
        border-radius: 0.25rem;
    }
    .form-label {
        font-weight: 500;
    }
    .mb-3 {
        margin-bottom: 1rem !important;
    }
</style>
@endsection
