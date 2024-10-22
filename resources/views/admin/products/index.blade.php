@extends('layout.app')

@section('title', 'จัดการสินค้า')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center text-white rounded-top border-0" style="background: linear-gradient(135deg, #4b6cb7, #182848);">
            <h5 class="mb-0">จัดการสินค้า</h5>
            <a href="{{ route('admin.products.create') }}" class="btn btn-light btn-sm">
                <i class="fas fa-plus"></i> เพิ่มสินค้า
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
                            <th>ชื่อสินค้า</th>
                            <th>รายละเอียด</th>
                            <th>ราคา</th>
                            <th>รูปภาพ</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $index => $product)
                            <tr>
                                <td>{{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ number_format($product->price, 2) }} ฿</td>
                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-thumbnail" style="max-height: 100px;">
                                    @else
                                        ไม่มีรูปภาพ
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm d-flex align-items-center me-1 mb-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="ms-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="dataTables_info">
                    แสดงผล {{ $products->firstItem() }} ถึง {{ $products->lastItem() }} จากทั้งหมด {{ $products->total() }} รายการ
                </div>
                <div>
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

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
    font-size: 1.25rem; /* ขยายขนาดตัวอักษรหัวข้อ */
}
.btn {
    display: flex;
    align-items: center;
    transition: background-color 0.3s ease, transform 0.3s ease;
    border-radius: 0.25rem;
    padding: 0.5rem 1rem;
    white-space: nowrap;
    font-size: 1rem; /* ขยายขนาดตัวอักษรปุ่ม */
}
.alert-success {
    background-color: #d4edda;
    color: #155724;
    border-color: #c3e6cb;
    font-size: 1rem; /* ขยายขนาดตัวอักษรข้อความแจ้งเตือน */
}
.btn-close {
    color: #155724;
}
.form-control {
    border-radius: 0.25rem;
    font-size: 1rem; /* ขยายขนาดตัวอักษรในฟอร์ม */
}
.form-label {
    font-weight: 500;
    font-size: 1rem; /* ขยายขนาดตัวอักษรป้ายกำกับในฟอร์ม */
}
.table {
    margin-top: 1rem;
}
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}
.table th, .table td {
    vertical-align: middle;
    text-align: center;
    white-space: nowrap; /* ป้องกันการตกบรรทัดในทุกคอลัมน์ */
    word-wrap: break-word;
    word-break: break-word;
    padding: 10px 12px;
    font-size: 1rem; /* ขยายขนาดตัวอักษรในตาราง */
}
.table td:nth-child(3) {
    white-space: normal; /* อนุญาตให้ตกบรรทัดเฉพาะคอลัมน์ที่ 3 (รายละเอียด) */
    text-align: left; /* จัดให้ชิดซ้ายสำหรับคอลัมน์รายละเอียด */
}
.table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.05);
}
.img-thumbnail {
    border-radius: 0.25rem;
    max-height: 75px;
    margin: 0 auto;
}
.d-flex .btn {
    margin-right: 0.5rem;
}
.d-flex .btn:last-child {
    margin-right: 0;
}
.dataTables_info {
    font-size: 1rem; /* ขยายขนาดตัวอักษรข้อมูล */
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
    font-size: 1rem; /* ขยายขนาดตัวอักษรในหน้าเพจ */
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
        width: 100px;
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
        font-size: 0.875rem; /* ขยายขนาดตัวอักษรสำหรับหน้าจอเล็ก */
    }
    .pagination .page-link {
        font-size: 0.875rem; /* ขยายขนาดตัวอักษรสำหรับหน้าจอเล็ก */
    }
}

</style>
@endsection
