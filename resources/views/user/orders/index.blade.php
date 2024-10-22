<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการคำสั่งซื้อ</title>

    <!-- เพิ่มฟอนต์ Prompt และ Sarabun จาก Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f5f2;
            font-family: 'Prompt', 'Sarabun', sans-serif;
        }

        .container {
            margin-top: 20px;
            margin-bottom: 20px;
            max-width: 900px;
            padding: 0 15px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            border: none;
            background-color: #fff;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #2d98da, #227093);
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            padding: 10px 15px;
            border-radius: 12px 12px 0 0;
            position: relative;
        }

        .back-button {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 8px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .table-responsive {
            padding: 15px;
            overflow-x: auto;
        }

        .table thead {
            background-color: #2d98da;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f7f7f7;
        }

        .table tbody tr:hover {
            background-color: #e0f2f1;
        }

        .table td,
        .table th {
            vertical-align: middle;
            text-align: center;
            padding: 12px;
            font-size: 0.85rem;
            white-space: nowrap;
        }

        .btn-primary {
            background-color: #2d98da;
            border-color: #2d98da;
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 0.9rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
            white-space: nowrap;
        }

        .btn-primary:hover {
            background-color: #227093;
            transform: translateY(-3px);
        }

        .btn-primary i {
            margin-right: 5px;
        }

        .empty-message {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 1.1rem;
            color: #888;
        }

        .dataTables_info {
            font-size: 0.85rem;
            color: #555;
        }

        /* สไตล์ป้ายสถานะ (Status Badge Styles) */
        .badge {
            padding: 0.5rem;
            font-size: 0.85rem;
            border-radius: 12px;
            border: 2px solid transparent;
            white-space: nowrap;
        }

        .badge-success {
            background-color: #28a745;
            color: white;
            border-color: #218838;
        }

        .badge-warning {
            background-color: #ffc107;
            color: white;
            border-color: #e0a800;
        }

        .badge-primary {
            background-color: #007bff;
            color: white;
            border-color: #0056b3;
        }

        .badge-orange {
            background-color: #fd7e14;
            color: white;
            border-color: #e36d0a;
        }

        .badge-danger {
            background-color: #dc3545;
            color: white;
            border-color: #c82333;
        }

        /* การออกแบบสำหรับอุปกรณ์เคลื่อนที่ (Responsive Design) */
        @media (max-width: 768px) {
            .card-header {
                font-size: 1rem;
                padding: 10px;
            }

            .container {
                padding: 0 5px;
            }

            .table td,
            .table th {
                font-size: 0.75rem;
                padding: 8px;
            }

            .btn-primary {
                font-size: 0.8rem;
                padding: 6px 12px;
            }

            .table-responsive {
                padding: 5px;
            }

            .dataTables_info {
                font-size: 0.75rem;
            }

            .badge {
                padding: 0.4rem;
                font-size: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                รายการคำสั่งซื้อของคุณ
                <a href="{{  route('purchase.menu') }}" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            @if($orders->isEmpty())
                <div class="empty-message">
                    <p>ยังไม่มีคำสั่งซื้อ</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสคำสั่งซื้อ</th>
                                <th>ดูสินค้า</th>
                                <th>ราคารวม</th>
                                <th>สถานะ</th>
                                <th>วันที่</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $index => $order)
                            <tr>
                                <td>{{ ($orders->currentPage() - 1) * $orders->perPage() + $index + 1 }}</td>
                                <td>คำสั่งซื้อ #{{ $order->id }}</td>
                                <td>
                                    <a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-primary">
                                        <i class="fas fa-eye"></i> สินค้าสั่งซื้อ
                                    </a>
                                </td>
                                <td>{{ number_format($order->total_price, 2) }} ฿</td>
                                <td>
                                    @switch($order->status)
                                        @case('อยู่ระหว่างดำเนินการ')
                                            <span class="badge badge-success">{{ $order->status }}</span>
                                            @break
                                        @case('จัดเตรียมสินค้า')
                                            <span class="badge badge-warning">{{ $order->status }}</span>
                                            @break
                                        @case('อยู่ระหว่างการจัดส่ง')
                                            <span class="badge badge-primary">{{ $order->status }}</span>
                                            @break
                                        @case('เสร็จสมบูรณ์')
                                            <span class="badge badge-orange">{{ $order->status }}</span>
                                            @break
                                        @case('ยกเลิกคำสั่งซื้อ')
                                            <span class="badge badge-danger">{{ $order->status }}</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->locale('th')->isoFormat('D MMMM YYYY HH:mm น.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- เพิ่มการแบ่งหน้าและข้อมูล -->
                    <div class="d-flex justify-content-between align-items-center flex-column flex-md-row mt-3">
                        <div class="dataTables_info mb-2 mb-md-0">
                            แสดงข้อมูลตั้งแต่ {{ $orders->firstItem() }} ถึง {{ $orders->lastItem() }} จากทั้งหมด {{ $orders->total() }} รายการ
                        </div>
                        <div>
                            {{ $orders->links('pagination::bootstrap-4') }}
                        </div>
                    </div>

                </div>
            @endif
        </div>
    </div>
</body>

</html>
