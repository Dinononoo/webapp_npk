@extends('layout.app')

@section('title', 'ข้อมูลเซ็นเซอร์')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center text-white rounded-top border-0" style="background: linear-gradient(135deg, #4b6cb7, #182848);">
            <h5 class="mb-0">ข้อมูลเซ็นเซอร์</h5>
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
                            <th>ID เซ็นเซอร์</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $rowNumber = ($uniqueSensors->currentPage() - 1) * $uniqueSensors->perPage() + 1; @endphp
                        @foreach($uniqueSensors as $sensor)
                            <tr>
                                <td class="align-middle">{{ $rowNumber++ }}</td>
                                <td class="align-middle">{{ $sensor->sensor_id }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.npks.show', $sensor->id) }}" class="btn btn-info btn-sm btn-icon view-button">
                                        <i class="fas fa-eye"></i> ดูข้อมูลการวัด
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="dataTables_info">
                    แสดงผล {{ $uniqueSensors->firstItem() }} ถึง {{ $uniqueSensors->lastItem() }} จากทั้งหมด {{ $uniqueSensors->total() }} รายการ
                </div>
                <div>
                    {{ $uniqueSensors->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

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
    .btn {
        display: flex;
        align-items: center;
        transition: background-color 0.3s ease, transform 0.3s ease;
        border-radius: 0.25rem;
        padding: 0.5rem 0.75rem;
    }
    .btn i {
        margin-right: 0.25rem;
    }
    .btn-icon {
        padding: 0.25rem 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .btn-info {
        background-color: #4ab1c5;
        color: #ffffff;
        border: none;
    }
    .view-button {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        background-color: #4ab1c5;
        color: #ffffff;
        width: 30%;
    }
    .view-button:hover {
        background-color: #3898aa;
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
    .img-thumbnail {
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
