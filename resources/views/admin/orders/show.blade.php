@extends('layout.app')

@section('title', 'รายละเอียดคำสั่งซื้อ')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white rounded-top border-0 d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #4b6cb7, #182848);">
            <h5 class="mb-0">รายละเอียดคำสั่งซื้อ</h5>
            <a href="{{ url()->previous() }}" class="btn btn-light btn-sm d-flex align-items-center">
                <i class="fas fa-arrow-left me-2"></i> ย้อนกลับ
            </a>
        </div>
        <div class="card-body p-4">
            <p class="fw-bold">สินค้า:</p>
            <ul class="list-group mb-4">
                @foreach($order->products as $product)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 0.25rem; margin-right: 15px;">
                            <span class="fw-semibold">{{ $product->name }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge quantity-badge">{{ $product->pivot->quantity }} ชิ้น</span>
                            <span class="badge price-badge ms-3">{{ number_format($product->price, 2) }} ฿</span>
                        </div>
                    </li>
                @endforeach
            </ul>
            <p class="fw-bold">ราคารวม: <span class="text-primary">{{ number_format($order->total_price, 2) }} ฿</span></p>
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
    .list-group-item {
        border: none;
        border-radius: 0.25rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
    }
    .fw-bold {
        font-weight: 700;
    }
    .fw-semibold {
        font-weight: 600;
    }
    .badge {
        font-size: 1rem;
    }
    .quantity-badge {
        background: linear-gradient(135deg, #74b9ff, #0984e3);
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
    }
    .price-badge {
        background: linear-gradient(135deg, #ff6b6b, #d63031);
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        margin-left: 0.5rem; /* เพิ่มระยะห่างระหว่าง badge */
    }
</style>
@endsection
