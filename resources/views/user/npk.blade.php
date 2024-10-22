<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลที่ได้รับ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 1rem;
            overflow-x: hidden; /* ป้องกันการเลื่อนในแนวนอน */
        }

        .container {
            background: linear-gradient(135deg, #0a7303, #a0e69b);
            border-radius: 15px;
            padding: 20px;
            max-width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #fff;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%; /* ปรับขนาดตารางให้เต็มหน้าจอ */
            background: #fff;
            border-radius: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .average-box {
            text-align: center;
            background: #fff;
            padding: 10px;
            border-radius: 10px;
            font-weight: bold;
            color: #000;
        }

        .btn-primary {
            border: none;
            border-radius: 10px;
            width: 100%;
            padding: 10px;
            transition: background-color 0.3s;
            margin-bottom: 10px;
            background-color: #03a503;
            margin-top: 20px; /* เพิ่มระยะห่างด้านบน */
        }

        .btn-primary:hover {
            background-color: #028a02;
        }

        .btn-danger {
            border: none;
            border-radius: 10px;
            padding: 5px 10px;
            transition: background-color 0.3s;
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-icon .bi {
            margin-right: 5px;
        }

        /* ปรับแต่งปุ่มลิงค์ตำแหน่ง */
        .position-link {
            display: inline-block;
            background-color: #02a5f7;
            color: #fff;
            padding: 8px 15px; /* ขนาดเล็กลง */
            border-radius: 8px; /* โค้งมนเล็กน้อย */
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            font-size: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* เพิ่มเงา */
        }

        .position-link:hover {
            background-color: #017bb5;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* เพิ่มเงาเมื่อ hover */
        }

        /* ปรับขนาดสำหรับหน้าจอใหญ่ */
        @media (min-width: 1200px) {
            .container {
                max-width: 1200px; /* ขยายขนาด container ให้ใหญ่ขึ้นบน PC */
                padding: 40px;
            }

            .position-link {
                padding: 10px 25px; /* ปรับขนาดปุ่มบนหน้าจอใหญ่ */
                font-size: 1.2rem;
            }

            .btn-primary {
                padding: 15px;
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">ข้อมูลที่ได้รับ</h2>
        <div class="table-responsive" id="data-table">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-success">
                        <th>จุดที่</th>
                        <th>Sensor ID</th>
                        <th>ค่า N</th>
                        <th>ค่า P</th>
                        <th>ค่า K</th>
                        <th>ค่า PH</th>
                        <th>ตำแหน่ง</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody id="data-body">
                    @foreach ($dataPoints as $index => $dataPoint)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ is_array($dataPoint) ? $dataPoint['sensor_id'] : $dataPoint->sensor_id }}</td>
                            <td>{{ is_array($dataPoint) ? $dataPoint['N'] : $dataPoint->N }}</td>
                            <td>{{ is_array($dataPoint) ? $dataPoint['P'] : $dataPoint->P }}</td>
                            <td>{{ is_array($dataPoint) ? $dataPoint['K'] : $dataPoint->K }}</td>
                            <td>{{ is_array($dataPoint) ? $dataPoint['PH'] : $dataPoint->PH }}</td>
                            <td>
                                <a href="{{ $dataPoint['map_link'] }}" target="_blank" class="position-link">
                                    {{ number_format($dataPoint['latitude'], 7) }}, {{ number_format($dataPoint['longitude'], 7) }}
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('npk.delete', $index) }}" onsubmit="return confirm('คุณแน่ใจที่จะลบข้อมูลนี้หรือไม่?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-icon"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="average-box">
            ค่าเฉลี่ย NPK/PH <br>
            {{ round($averages['averageN'], 2) }}-{{ round($averages['averageP'], 2) }}-{{ round($averages['averageK'], 2) }} / {{ round($averages['averagePH'], 2) }}
        </div>
        <a href="{{ route('login') }}" class="btn btn-primary">ประเมินขั้นสูง</a>
    </div>
</body>
</html>
