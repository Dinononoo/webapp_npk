@extends('layout.app')

@section('title', 'รายละเอียดเซ็นเซอร์')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white rounded-top border-0 d-flex justify-content-center align-items-center" style="background: linear-gradient(135deg, #4b6cb7, #182848);">
            <h5 class="mb-0 flex-grow-1 text-center">รายละเอียดเซ็นเซอร์</h5>
            <a href="{{ route('admin.npks.shownpk', ['sensor' => $sensor->id]) }}" class="btn btn-light btn-sm d-flex align-items-center flex-shrink-0" style="white-space: nowrap;">
                <i class="fas fa-arrow-left me-2"></i> ย้อนกลับ
            </a>
        </div>
        <div class="card-body p-4 text-center">
            <h5 class="mb-0" style="font-weight: bold;">ID เซ็นเซอร์: {{ $sensor->sensor_id }}</h5>
            <div class="table-responsive mt-4">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ลำดับ</th>
                            <th>N ไนโตรเจน (mg/Kg)</th>
                            <th>P ฟอสฟอรัส (mg/Kg)</th>
                            <th>K โพแทสเซียม (mg/Kg)</th>
                            <th>ตำแหน่ง</th>
                            <th>วันที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sensorData as $data)
                        <tr>
                            <td>{{ ($sensorData->currentPage() - 1) * $sensorData->perPage() + $loop->iteration }}</td>
                            <td>{{ $data->N }}</td>
                            <td>{{ $data->P }}</td>
                            <td>{{ $data->K }}</td>
                            <td>
                                <a href="https://www.google.com/maps?q={{ $data->latitude }},{{ $data->longitude }}" target="_blank" class="btn btn-primary">
                                    {{ $data->latitude }}, {{ $data->longitude }}
                                </a>
                            </td>
                            <td>{{ $data->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="dataTables_info">
                    แสดง {{ $sensorData->firstItem() }} ถึง {{ $sensorData->lastItem() }} จากทั้งหมด {{ $sensorData->total() }} รายการ
                </div>
                <div>
                    {{ $sensorData->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

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
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-body {
        text-align: center;
    }

    .table-responsive {
        margin-top: 2rem;
    }

    .btn {
        white-space: nowrap;
        /* ป้องกันปุ่มตกบรรทัด */
    }
</style>
@endsection
