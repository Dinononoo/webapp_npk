<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลลัพธ์การคำนวณสูตรปุ๋ย</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background: radial-gradient(circle at top right, #e0eafc, #cfdef3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            padding: 30px; /* ลด padding */
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px; /* ลดความกว้างเพื่อให้พอดีกับมือถือ */
            width: 100%;
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .back-icon {
            position: absolute;
            top: 1rem;
            left: 1rem;
            font-size: 1.2rem;
            color: #fff;
            cursor: pointer;
            background-color: #4e89ae;
            padding: 0.5rem;
            border-radius: 50%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            font-weight: 700;
            color: #444;
            margin-bottom: 20px;
            font-size: 1.4rem; /* ลดขนาดฟอนต์ */
        }

        .result-box {
            padding: 10px; /* ลด padding */
            background-color: #f0f8ff;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            border: 2px solid #4e89ae;
        }

        .result-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 1rem;
        }

        .result-item:last-child {
            border-bottom: none;
        }

        .result-item strong {
            color: #ff5722;
            flex: 1;
            text-align: left;
        }

        .result-item i {
            font-size: 1.5rem;
            color: #4e89ae;
            margin-right: 10px;
        }

        .result-number {
            border: 2px solid #4e89ae;
            padding: 5px 10px;
            border-radius: 8px;
            background-color: #ffffff;
            color: #4e89ae;
            font-weight: bold;
            font-size: 1rem;
        }

        .total-weight {
            margin-top: 15px; /* ลดระยะห่าง */
        }

        .total-weight strong {
            font-size: 1.4rem; /* ลดขนาดฟอนต์ */
            color: #4e89ae;
        }

        .total-weight i {
            font-size: 1.6rem;
            color: #4e89ae;
        }

        .btn-primary,
        .btn-secondary {
            border: none;
            padding: 10px 20px; /* ลด padding */
            font-size: 1rem;
            border-radius: 50px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #4e89ae;
        }

        .btn-primary:hover {
            background-color: #3b6c8a;
            transform: translateY(-3px);
        }

        .btn-secondary {
            background-color: #ff5722;
        }

        .btn-secondary:hover {
            background-color: #e64a19;
            transform: translateY(-3px);
        }

        /* ปรับการแสดงผลบนมือถือ */
        @media (max-width: 768px) {
            .container {
                padding: 20px; /* ปรับ padding */
            }

            h2 {
                font-size: 1.2rem; /* ลดขนาดฟอนต์ */
            }

            .btn-primary,
            .btn-secondary {
                font-size: 0.9rem;
                padding: 8px 15px; /* ปรับขนาดปุ่ม */
            }

            .back-icon {
                font-size: 1rem;
                padding: 0.4rem;
            }
        }

        @media (max-width: 576px) {
            h2 {
                font-size: 1.1rem; /* ลดขนาดฟอนต์บนมือถือ */
            }

            .btn-primary,
            .btn-secondary {
                font-size: 0.8rem;
                padding: 7px 10px; /* ปรับขนาดปุ่มบนมือถือ */
            }

            .result-item i {
                font-size: 1.2rem; /* ลดขนาดไอคอน */
            }

            .result-number {
                font-size: 0.9rem; /* ลดขนาดฟอนต์ */
            }

            .total-weight strong {
                font-size: 1.2rem; /* ลดขนาดฟอนต์ */
            }

            .total-weight i {
                font-size: 1.4rem; /* ลดขนาดไอคอน */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="javascript:history.back()" class="back-icon">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h2>ผลลัพธ์การคำนวณสูตรปุ๋ย</h2>
        <div class="result-box">
            <div class="result-item">
                <i class="bi bi-droplet-half"></i>
                <strong>(Urea) 46-0-0 </strong>
                <span class="result-number">{{ $fertilizer_mix['urea'] }} กิโลกรัม</span>
            </div>
            <div class="result-item">
                <i class="bi bi-droplet-half"></i>
                <strong>(DAP) 18-46-0 </strong>
                <span class="result-number">{{ $fertilizer_mix['dap'] }} กิโลกรัม</span>
            </div>
            <div class="result-item">
                <i class="bi bi-droplet-half"></i>
                <strong>(MOP) 0-0-60 </strong>
                <span class="result-number">{{ $fertilizer_mix['mop'] }} กิโลกรัม</span>
            </div>
            <div class="result-item">
                <i class="bi bi-boxes"></i>
                <strong>สารเติมเต็ม (Filler) </strong>
                <span class="result-number">{{ $fertilizer_mix['filler'] }} กิโลกรัม</span>
            </div>
        </div>
        <div class="total-weight">
            <i class="bi bi-scale"></i>
            <strong>น้ำหนักทั้งหมด: {{ $total_weight }} กิโลกรัม</strong>
        </div>

        <!-- ปุ่มคำนวณใหม่ -->
<form action="{{ route('fertilizer.custom.showForm') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-secondary mt-3">คำนวณใหม่</button>
</form>

        <!-- ปุ่มกลับไปหน้าหลัก -->
        <a href="{{ route('user.dashboard') }}" class="btn btn-primary mt-3">กลับไปหน้าหลัก</a>
    </div>
</body>

</html>
