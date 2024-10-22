@extends('layout.app')

@section('title', 'อัปโหลด QR Code')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center text-white rounded-top border-0" style="background: linear-gradient(135deg, #4b6cb7, #182848);">
            <h5 class="mb-0">อัปโหลด QR Code</h5>
        </div>
        <div class="card-body p-4">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- แสดง QR Code ถ้ามี -->
            <div class="mb-3 text-center">
                <img id="qrcode-preview" src="{{ asset('storage/' . $qrcodePath) }}" alt="QR Code Preview" class="img-thumbnail" style="max-height: 300px;">
            </div>

            <form action="{{ route('admin.upload.qrcode.process') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="qrcode" class="form-label"></label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="qrcode" name="qrcode" accept="image/*" required onchange="previewQRCode(event)">
                        <label class="input-group-text custom-file-upload" for="qrcode">เลือกไฟล์</label>
                    </div>
                    <div class="mt-2 text-center">
                        <img id="qrcode-preview-temp" src="#" alt="QR Code Preview" class="img-thumbnail" style="max-height: 300px; display: none;">
                    </div>
                </div>
                <div class="mb-3">
                    <p id="file-name" class="text-muted"></p>
                </div>
                <button type="submit" class="btn btn-primary d-flex align-items-center">
                    <i class="fas fa-upload me-2"></i> อัปโหลด
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

    .input-group .custom-file-upload {
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

    .input-group input[type="file"]:focus ~ .custom-file-upload {
        border-color: #ff6b6b;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.25);
    }

    .input-group input[type="file"]:valid ~ .custom-file-upload::after {
        content: "✓";
        color: #fff;
        font-size: 1.5rem;
        margin-left: 0.5rem;
    }

    .input-group input[type="file"]::file-selector-button {
        display: none;
    }

    .input-group input[type="file"]::-webkit-file-upload-button {
        display: none;
    }

    .input-group input[type="file"]:focus ~ .custom-file-upload::after {
        content: "✓";
        color: #fff;
        font-size: 1.5rem;
        margin-left: 0.5rem;
    }
</style>
<script>
    function previewQRCode(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('qrcode-preview-temp');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);

        var fileName = event.target.files[0].name;
        document.getElementById('file-name').textContent = 'ไฟล์ที่เลือก: ' + fileName;
    }
</script>
@endsection
