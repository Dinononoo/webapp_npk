@extends('layout.app')

@section('title', 'เพิ่มสินค้า')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white rounded-top border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #4b6cb7, #182848);">
            <h5 class="mb-0">เพิ่มสินค้า</h5>
            <a href="{{ url()->previous() }}" class="btn btn-light btn-sm d-flex align-items-center">
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

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อสินค้า</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">ราคา</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">รูปภาพ</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required onchange="previewImage(event)">
                        <label class="input-group-text" for="image">เลือกไฟล์</label>
                    </div>
                    <div class="mt-2">
                        <img id="preview" src="#" alt="ตัวอย่างรูปภาพ" class="img-thumbnail" style="max-height: 200px; display: none;">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-flex align-items-center">
                    <i class="fas fa-plus me-2"></i> เพิ่มสินค้า
                </button>
            </form>
        </div>
    </div>
</div>

<!-- เพิ่ม Font Awesome สำหรับไอคอน -->
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
    .form-label {
        font-weight: 500;
    }
    .input-group {
        position: relative;
        display: flex;
        align-items: center;
    }
    .input-group input[type="file"] {
        position: relative;
        z-index: 2;
        width: 100%;
        height: 2.5rem;
        margin: 0;
        opacity: 0;
    }
    .input-group .input-group-text {
        height: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1rem;
        background-color: #ff6b6b;
        color: #fff;
        border: 1px solid #ff6b6b;
        border-left: 0;
        border-radius: 0 0.25rem 0.25rem 0;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .input-group input[type="file"]:focus ~ .input-group-text {
        border-color: #ff6b6b;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.25);
    }
    .input-group input[type="file"]:valid ~ .input-group-text::after {
        content: "✓";
        color: #fff;
        font-size: 1.5rem;
        margin-left: 0.5rem;
    }
</style>
<!-- เพิ่ม JavaScript เพื่อจัดการป้ายชื่อไฟล์และแสดงตัวอย่างรูปภาพ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var fileInput = document.querySelector('input[type="file"]');
        var fileLabel = document.querySelector('.input-group-text');
        
        fileInput.addEventListener('change', function() {
            var fileName = fileInput.files[0].name;
            fileLabel.textContent = fileName;

            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.getElementById('preview');
                
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(fileInput.files[0]);
        });
    });
</script>
@endsection
