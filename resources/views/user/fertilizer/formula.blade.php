<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพื่อการคำนวณสูตรปุ๋ยสั่งตัด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom, #a8e063, #56ab2f);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 10px;
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 20px;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            color: #000;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .table-responsive {
            flex-grow: 1;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .table {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            background-color: #e9f7ef;
            color: #000;
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #adb5bd;
        }

        .average-box {
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            border: none;
            border-radius: 10px;
            width: 100%;
            padding: 8px;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #03a503;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #028a02;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-danger {
            border: none;
            border-radius: 10px;
            padding: 5px 10px;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .text-white {
            color: #fff;
        }

        .back-btn {
            position: absolute;
            top: 30px;
            left: 20px;
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 36px;
            transition: color 0.3s;
        }

        .back-btn:hover {
            color: #000;
        }

        .position-link {
            display: inline-block;
            background-color: #02a5f7;
            color: #fff;
            padding: 8px 15px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            font-size: 1rem;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .position-link:hover {
            background-color: #017bb5;
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .average-box {
                font-size: 0.9rem;
            }

            .back-btn {
                left: 10px;
                top: 20px;
            }
        }
    </style>
</head>

<body>
    <a href="{{ route('calculation.menu') }}" class="back-btn">
        <i class="bi bi-arrow-left-circle-fill"></i>
    </a>
    <div class="container">
    <h2 class="text-center mb-4">ค่าที่วัดได้</h2>

    @if(session('message'))
    <div class="alert alert-warning text-center">
        {{ session('message') }}
    </div>
    @elseif(empty($dataPoints) || count($dataPoints) == 0)
    <div class="alert alert-warning text-center">
        ไม่มีข้อมูลการวัดจากเซ็นเซอร์
    </div>
    @else
    <!-- ส่วนของตาราง -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
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
            <tbody>
                @foreach ($dataPoints as $index => $dataPoint)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $dataPoint['sensor']['sensor_id'] ?? 'ไม่พบ Sensor ID' }}</td>
                    <td>{{ $dataPoint['N'] }}</td>
                    <td>{{ $dataPoint['P'] }}</td>
                    <td>{{ $dataPoint['K'] }}</td>
                    <td>{{ $dataPoint['PH'] }}</td>
                    <td>
                        @if(isset($dataPoint['latitude']) && isset($dataPoint['longitude']))
                        <a href="https://maps.google.com/?q={{ $dataPoint['latitude'] }},{{ $dataPoint['longitude'] }}" target="_blank" class="position-link">
                            {{ number_format($dataPoint['latitude'], 7) }}, {{ number_format($dataPoint['longitude'], 7) }}
                        </a>
                        @else
                        <p>ตำแหน่งไม่พร้อมใช้งาน</p>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('fertilizer.destroy', $dataPoint['id']) }}" method="POST" onsubmit="return confirm('คุณแน่ใจที่จะลบข้อมูลนี้หรือไม่?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm btn-icon"><i class="bi bi-trash"></i></button>
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
    <a href="{{ route('fertilizer.plantSelection') }}" class="btn btn-primary btn-icon">
        <i class="bi bi-arrow-right"></i> หน้าถัดไป
    </a>
    @endif
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
