<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการคำนวณจากเซนเซอร์ NPK</title>

    <!-- เพิ่มฟอนต์ Lato และ Mitr จาก Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Mitr:wght@300;400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            /* เปลี่ยนฟอนต์เป็น Lato หรือ Mitr */
            font-family: 'Lato', 'Mitr', sans-serif;
            background-color: #f4f9f4;
            color: #333;
            padding-bottom: 50px;
        }

        .container {
            margin-top: 30px;
            max-width: 100%;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border: none;
            background-color: #ffffff;
            transition: transform 0.3s ease;
        }

        .card-header {
            background: linear-gradient(135deg, #56c596, #28a745);
            color: white;
            text-align: center;
            font-size: 1.8rem;
            padding: 20px;
            border-radius: 20px 20px 0 0;
            font-weight: 600;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .back-button {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            font-size: 0.9rem;
            color: #fff;
            text-decoration: none;
            background-color: rgba(255, 255, 255, 0.3);
            border: 2px solid #fff;
            border-radius: 50%;
            padding: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
        }

        .back-button:hover {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border-color: #000;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .back-button i {
            font-size: 1rem;
        }

        .table-responsive {
            padding: 20px;
        }

        .table {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
            font-size: 0.95rem;
            padding: 12px;
            border: 1px solid #e6f5e6;
        }

        .table th {
            background-color: #28a745;
            color: white;
            font-size: 1rem;
            letter-spacing: 0.05rem;
            border-top: none;
        }

        /* เพิ่มกรอบและสีเฉพาะค่าที่แสดงสำหรับคอลัมน์ N P K */
        .table td.sensor-n {
            background-color: #fce4ec;
            border: 2px solid #ec407a;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0px 2px 8px rgba(236, 64, 122, 0.2);
        }

        .table td.sensor-p {
            background-color: #e8f5e9;
            border: 2px solid #66bb6a;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0px 2px 8px rgba(102, 187, 106, 0.2);
        }

        .table td.sensor-k {
            background-color: #fffde7;
            border: 2px solid #ffd54f;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0px 2px 8px rgba(255, 213, 79, 0.2);
        }

        /* เพิ่มกรอบและสีสำหรับคอลัมน์ปุ๋ย 46-0-0, 18-46-0, 0-0-60 */
        .table td.fertilizer-46-0-0 {
            background-color: #ffe6e6;
            border: 2px solid #ff6666;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0px 2px 8px rgba(255, 102, 102, 0.2);
        }

        .table td.fertilizer-18-46-0 {
            background-color: #e6f2ff;
            border: 2px solid #3399ff;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0px 2px 8px rgba(51, 153, 255, 0.2);
        }

        .table td.fertilizer-0-0-60 {
            background-color: #e6ffe6;
            border: 2px solid #33cc33;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0px 2px 8px rgba(51, 204, 51, 0.2);
        }

        .table td.empty-cell {
            background-color: #f4f4f4;
        }

        .table tbody tr:hover {
            background-color: #f0fdf0;
        }

        .pagination {
            justify-content: center;
            margin: 30px auto;
            display: flex;
            gap: 10px;
        }

        .pagination .page-item .page-link {
            color: #28a745;
            padding: 8px 12px;
            font-size: 0.85rem;
            border-radius: 10px;
            border: 1px solid #28a745;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination .page-item .page-link:hover {
            background-color: #28a745;
            color: white;
        }

        .pagination .page-item.active .page-link {
            background-color: #28a745;
            color: white;
            border: none;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.3);
        }

        .card-footer {
            padding: 20px;
            text-align: center;
            font-size: 1rem;
            background-color: #f4f7f6;
            border-radius: 0 0 20px 20px;
        }

        .fa-leaf {
            color: #28a745;
            font-size: 1.2rem;
        }

        .table-row {
            transition: all 0.2s ease-in-out;
        }

        .table-row:hover {
            transform: scale(1.02);
            background-color: #e6f5e6;
        }

        @media (max-width: 768px) {
            .card-header {
                font-size: 1.5rem;
            }

            .table th,
            .table td {
                font-size: 0.85rem;
            }

            .pagination .page-item .page-link {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('calculation.menu') }}" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                </a>
                ประวัติการคำนวณจากเซนเซอร์ NPK
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover mytable">
                    <thead>
                        <tr>
                            <th rowspan="2">ลำดับ</th>
                            <th rowspan="2">พืช</th>
                            <th rowspan="2">ชนิดพืช</th>
                            <th rowspan="2">ระยะของพืช</th>
                            <th colspan="3">ค่าเฉลี่ย NPK ที่วัดจากเซนเซอร์</th>
                            <th rowspan="2">NPK ที่เหมาะสม</th>
                            <th colspan="3">แนะนำปุ๋ยสั่งตัด</th>
                        </tr>
                        <tr>
                            <th>N</th>
                            <th>P</th>
                            <th>K</th>
                            <th>46-0-0</th>
                            <th>18-46-0</th>
                            <th>0-0-60</th>
                        </tr>
                    </thead>

                    <tbody id="tableBody">
                        @foreach($sensorHistories as $index => $history)
                        <tr class="table-row">
                            <td>{{ ($sensorHistories->currentPage() - 1) * $sensorHistories->perPage() + $index + 1 }}</td>
                            <td>{{ $history->plant->plant_name ?? '' }}</td>
                            <td>{{ $history->subPlant->sub_plant_name ?? '' }}</td>
                            <td>{{ $history->stage->stage_name ?? '' }}</td>
                            <td class="sensor-n">{{ $history->average_n ?: '' }}</td>
                            <td class="sensor-p">{{ $history->average_p ?: '' }}</td>
                            <td class="sensor-k">{{ $history->average_k ?: '' }}</td>
                            <td>{{ json_decode($history->npk_recommendation)->n ?? '' }} - {{ json_decode($history->npk_recommendation)->p ?? '' }} - {{ json_decode($history->npk_recommendation)->k ?? '' }}</td>
                            <td class="fertilizer-46-0-0">{{ json_decode($history->fertilizer_mix)->fertilizer_46_0_0 ?? '' }} กก.</td>
                            <td class="fertilizer-18-46-0">{{ json_decode($history->fertilizer_mix)->fertilizer_18_46_0 ?? '' }} กก.</td>
                            <td class="fertilizer-0-0-60">{{ json_decode($history->fertilizer_mix)->fertilizer_0_0_60 ?? '' }} กก.</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- แสดงข้อมูลและการแบ่งหน้า -->
            <div class="pagination-section" style="padding: 20px 30px;">
                <div class="d-flex flex-column align-items-center">
                    <div class="text-center mb-2" style="font-size: 0.85rem;">
                        แสดงข้อมูลตั้งแต่ {{ $sensorHistories->firstItem() }} ถึง {{ $sensorHistories->lastItem() }} จากทั้งหมด {{ $sensorHistories->total() }} รายการ
                    </div>
                    <div>
                        {{ $sensorHistories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <i class="fas fa-leaf"></i> ข้อมูลทั้งหมดแสดงผลตามค่าเฉลี่ยของข้อมูลจากเซนเซอร์
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
