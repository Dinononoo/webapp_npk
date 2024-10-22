@extends('layout.app')

@section('title', 'ที่อยู่ในการสั่งซื้อ')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white rounded-top border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #4b6cb7, #182848);">
            <h5 class="mb-0">ที่อยู่ในการสั่งซื้อ</h5>
            <a href="{{ url()->previous() }}" class="btn btn-light btn-sm d-flex align-items-center">
                <i class="fas fa-arrow-left me-2"></i> ย้อนกลับ
            </a>
        </div>
        <div class="card-body p-4">
            <div class="mb-3">
                <label class="fw-bold text-uppercase" for="orderName">ชื่อ:</label>
                <p id="orderName" class="fw-normal border rounded p-2">{{ $order->name }}</p>
            </div>
            <div class="mb-3">
                <label class="fw-bold text-uppercase" for="orderAddress">ที่อยู่:</label>
                <p id="orderAddress" class="fw-normal border rounded p-2">{{ $order->address }}</p>
            </div>
            <div class="mb-3">
                <label class="fw-bold text-uppercase" for="orderPhone">เบอร์โทรศัพท์:</label>
                <p id="orderPhone" class="fw-normal border rounded p-2">{{ $order->phone }}</p>
            </div>
            <div class="mb-3">
                <label class="fw-bold text-uppercase" for="orderDate">วันที่สั่งซื้อ:</label>
                <p id="orderDate" class="fw-normal border rounded p-2">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Add Font Awesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Add Bootstrap JS for modal functionality -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

    .fw-bold {
        font-weight: 700;
    }

    .fw-normal {
        font-weight: 400;
    }

    .border {
        border: 1px solid #dee2e6;
    }

    .rounded {
        border-radius: 0.25rem;
    }

    .p-2 {
        padding: 0.5rem;
    }
</style>
@endsection