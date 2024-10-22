@extends('layout.app')

@section('title', 'จัดการคำสั่งซื้อ')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center text-white rounded-top border-0" style="background: linear-gradient(135deg, #4b6cb7, #182848);">
            <h5 class="mb-0">จัดการคำสั่งซื้อ</h5>
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
                            <th>รหัสคำสั่งซื้อ</th>
                            <th>สินค้า</th>
                            <th>สถานะ</th>
                            <th>สลิปการชำระเงิน</th>
                            <th>ที่อยู่</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $index => $order)
                        <tr>
                            <td>{{ ($orders->currentPage() - 1) * $orders->perPage() + $index + 1 }}</td>
                            <td>คำสั่งซื้อ #{{ $order->id }}</td> <!-- ทำให้รหัสคำสั่งซื้อแสดงแบบที่ต้องการ -->
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm btn-custom d-flex justify-content-center align-items-center mb-1">
                                    <i class="fas fa-eye me-1"></i> ดูสินค้า
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select form-select-sm btn-custom-select" onchange="this.form.submit()">
                                        <option value="อยู่ระหว่างดำเนินการ" {{ $order->status == 'อยู่ระหว่างดำเนินการ' ? 'selected' : '' }}>อยู่ระหว่างดำเนินการ</option>
                                        <option value="จัดเตรียมสินค้า" {{ $order->status == 'จัดเตรียมสินค้า' ? 'selected' : '' }}>จัดเตรียมสินค้า</option>
                                        <option value="อยู่ระหว่างการจัดส่ง" {{ $order->status == 'อยู่ระหว่างการจัดส่ง' ? 'selected' : '' }}>อยู่ระหว่างการจัดส่ง</option>
                                        <option value="เสร็จสมบูรณ์" {{ $order->status == 'เสร็จสมบูรณ์' ? 'selected' : '' }}>เสร็จสมบูรณ์</option>
                                        <option value="ยกเลิกคำสั่งซื้อ" {{ $order->status == 'ยกเลิกคำสั่งซื้อ' ? 'selected' : '' }}>ยกเลิกคำสั่งซื้อ</option>
                                    </select>

                                </form>
                            </td>
                            <td>
                                @if($order->payment_slip)
                                <a href="{{ route('admin.orders.showSlip', $order->id) }}" class="btn btn-primary btn-sm btn-custom d-flex justify-content-center align-items-center">
                                    <i class="fas fa-file-alt me-1"></i> ดูสลิป
                                </a>
                                @else
                                ไม่มีสลิปการชำระเงิน
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.orders.showAddress', $order->id) }}" class="btn btn-info btn-sm btn-custom d-flex justify-content-center align-items-center">
                                    <i class="fas fa-eye me-1"></i> ที่อยู่จัดส่ง
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-custom-delete d-flex justify-content-center align-items-center mb-1">
                                        <i class="fas fa-trash-alt me-1"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="dataTables_info">
                    Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} entries
                </div>
                <div>
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
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

    .btn {
        display: flex;
        justify-content: center;
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

    .table {
        margin-top: 1rem;
    }

    .table thead th {
        border-bottom: 2px solid #dee2e6;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .custom-select {
        border-radius: 0.25rem;
        padding: 0.25rem 0.5rem;
        transition: background-color 0.3s ease, transform 0.3s ease;
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
    }

    .custom-select:hover,
    .custom-select:focus {
        background-color: #e9ecef;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-color: #adb5bd;
    }

    .btn-custom {
        width: auto;
        min-width: 100px;
    }

    .btn-custom-select {
        width: auto;
        min-width: 150px;
    }

    .btn-custom-delete {
        width: 40px;
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
            width: auto;
            min-width: 80px;
        }

        .btn-custom-select {
            width: auto;
            min-width: 100px;
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