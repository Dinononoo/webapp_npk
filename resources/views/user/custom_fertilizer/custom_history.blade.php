<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการคำนวณด้วยตัวเอง</title>

    <!-- เพิ่มฟอนต์ Lato และ Mitr จาก Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Mitr:wght@300;400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Lato', 'Mitr', sans-serif;
            background-color: #e8f1f8;
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
            background: linear-gradient(135deg, #3498db, #2980b9);
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
            border: 1px solid #d5e3f3;
        }

        .table th {
            background-color: #2980b9;
            color: white;
            font-size: 1rem;
            letter-spacing: 0.05rem;
            border-top: none;
        }

        /* สไตล์กรอบและสีของคอลัมน์แนะนำปุ๋ย */
        .table td.fertilizer {
            border: 2px solid #2980b9;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0px 2px 8px rgba(41, 128, 185, 0.2);
        }

        .table td.fertilizer-46-0-0 {
            background-color: #eaf2f8;
            border: 2px solid #3498db;
        }

        .table td.fertilizer-18-46-0 {
            background-color: #d6eaf8;
            border: 2px solid #2980b9;
        }

        .table td.fertilizer-0-0-60 {
            background-color: #eafaf1;
            border: 2px solid #48c9b0;
        }

        .table td.filler {
            background-color: #fcf3cf;
            border: 2px solid #f39c12;
        }

        .table tbody tr:hover {
            background-color: #f0f8ff;
        }

        .pagination {
            justify-content: center;
            margin: 30px auto;
            display: flex;
            gap: 10px;
        }

        .pagination .page-item .page-link {
            color: #2980b9;
            padding: 8px 12px;
            font-size: 0.85rem;
            border-radius: 10px;
            border: 1px solid #2980b9;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination .page-item .page-link:hover {
            background-color: #2980b9;
            color: white;
        }

        .pagination .page-item.active .page-link {
            background-color: #2980b9;
            color: white;
            border: none;
            box-shadow: 0 0 5px rgba(41, 128, 185, 0.3);
        }

        .card-footer {
            padding: 20px;
            text-align: center;
            font-size: 1rem;
            background-color: #f4f7f6;
            border-radius: 0 0 20px 20px;
        }

        .fa-leaf {
            color: #2980b9;
            font-size: 1.2rem;
        }

        .table-row {
            transition: all 0.2s ease-in-out;
        }

        .table-row:hover {
            transform: scale(1.02);
            background-color: #d6eaf8;
        }

        /* Media queries สำหรับมือถือ */
        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }
            
            .card-header {
                font-size: 1.5rem;
                padding: 15px;
            }

            .table th,
            .table td {
                font-size: 0.8rem;
                padding: 8px;
            }

            .pagination .page-item .page-link {
                padding: 6px 10px;
                font-size: 0.75rem;
            }

            .card-footer {
                font-size: 0.9rem;
            }
        }

        /* สำหรับหน้าจอที่เล็กมากๆ */
        @media (max-width: 480px) {
            .card-header {
                font-size: 1.2rem;
            }

            .back-button {
                font-size: 0.8rem;
            }

            .table th,
            .table td {
                font-size: 0.7rem;
                padding: 6px;
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
                ประวัติการคำนวณด้วยตัวเอง
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th rowspan="2">ลำดับ</th>
                            <th colspan="3">สูตรปุ๋ย NPK</th>
                            <th rowspan="2">น้ำหนักปุ๋ยที่ต้องการ (กก.)</th>
                            <th colspan="4">แนะนำปุ๋ย</th>
                        </tr>
                        <tr>
                            <th>N</th>
                            <th>P</th>
                            <th>K</th>
                            <th>46-0-0 (กก.)</th>
                            <th>18-46-0 (กก.)</th>
                            <th>0-0-60 (กก.)</th>
                            <th>Filler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customHistories as $index => $history)
                        <tr class="table-row">
                            <td>{{ ($customHistories->currentPage() - 1) * $customHistories->perPage() + $index + 1 }}</td>
                            <td>
                                @if ($history->custom_formula_input)
                                    @php 
                                        $custom_formula = json_decode($history->custom_formula_input);
                                    @endphp
                                    {{ $custom_formula->N ?? '' }}
                                @else
                                   
                                @endif
                            </td>
                            <td>
                                @if ($history->custom_formula_input)
                                    @php 
                                        $custom_formula = json_decode($history->custom_formula_input);
                                    @endphp
                                    {{ $custom_formula->P ?? '' }}
                                @else
                                    
                                @endif
                            </td>
                            <td>
                                @if ($history->custom_formula_input)
                                    @php 
                                        $custom_formula = json_decode($history->custom_formula_input);
                                    @endphp
                                    {{ $custom_formula->K ?? '' }}
                                @else
                                   
                                @endif
                            </td>
                            <td>{{ number_format($history->fertilizer_weight, 0) }}</td>

                            <td class="fertilizer fertilizer-46-0-0">
                                @if ($history->calculation_method)
                                    @php 
                                        $calculation_method = json_decode($history->calculation_method);
                                    @endphp
                                    {{ $calculation_method->urea ?? '' }}
                                @else
                                    
                                @endif
                            </td>
                            <td class="fertilizer fertilizer-18-46-0">
                                @if ($history->calculation_method)
                                    @php 
                                        $calculation_method = json_decode($history->calculation_method);
                                    @endphp
                                    {{ $calculation_method->dap ?? '' }}
                                @else
                                    
                                @endif
                            </td>
                            <td class="fertilizer fertilizer-0-0-60">
                                @if ($history->calculation_method)
                                    @php 
                                        $calculation_method = json_decode($history->calculation_method);
                                    @endphp
                                    {{ $calculation_method->mop ?? '' }}
                                @else
                                    
                                @endif
                            </td>
                            <td class="filler">
                                @if ($history->calculation_method)
                                    @php 
                                        $calculation_method = json_decode($history->calculation_method);
                                    @endphp
                                    {{ $calculation_method->filler ?? '' }}
                                @else
                                    
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- แสดงข้อมูลและการแบ่งหน้า -->
            <div class="pagination-section" style="padding: 20px 30px;">
                <div class="d-flex flex-column align-items-center">
                    <div class="text-center mb-2" style="font-size: 0.85rem;">
                        แสดงข้อมูลตั้งแต่ {{ $customHistories->firstItem() }} ถึง {{ $customHistories->lastItem() }} จากทั้งหมด {{ $customHistories->total() }} รายการ
                    </div>
                    <div>
                        {{ $customHistories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <i class="fas fa-leaf"></i> ข้อมูลทั้งหมดแสดงผลตามสูตรปุ๋ยที่คำนวณโดยผู้ใช้
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
