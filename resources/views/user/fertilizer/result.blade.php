<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลลัพธ์การแนะนำปุ๋ย</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background: radial-gradient(circle at top right, #e0f7de, #d0f0c0); /* เปลี่ยนเป็นสีเขียว */
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
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
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
            background-color: #4CAF50; /* สีเขียว */
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
            font-size: 1.4rem;
        }

        .result-box {
            padding: 10px;
            background-color: #f0fff4; /* สีเขียวอ่อน */
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            border: 2px solid #4CAF50; /* สีเขียว */
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
            color: #4CAF50; /* สีเขียว */
            flex: 1;
            text-align: left;
        }

        .result-item i {
            font-size: 1.5rem;
            color: #4CAF50; /* สีเขียว */
            margin-right: 10px;
        }

        .result-number {
            border: 2px solid #4CAF50; /* สีเขียว */
            padding: 5px 10px;
            border-radius: 8px;
            background-color: #ffffff;
            color: #FF0000; /* เปลี่ยนเป็นสีแดง */
            font-weight: bold;
            font-size: 1rem;
        }

        .total-weight {
            margin-top: 15px;
        }

        .total-weight strong {
            font-size: 1.4rem;
            color: #4CAF50;
        }

        .total-weight i {
            font-size: 1.6rem;
            color: #4CAF50;
        }

        .btn-primary,
        .btn-secondary {
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 50px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #3b8e40;
            transform: translateY(-3px);
        }

        .btn-secondary {
            background-color: #ff5722;
        }

        .btn-secondary:hover {
            background-color: #e64a19;
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 1.2rem;
            }

            .btn-primary,
            .btn-secondary {
                font-size: 0.9rem;
                padding: 8px 15px;
            }

            .back-icon {
                font-size: 1rem;
                padding: 0.4rem;
            }
        }

        @media (max-width: 576px) {
            h2 {
                font-size: 1.1rem;
            }

            .btn-primary,
            .btn-secondary {
                font-size: 0.8rem;
                padding: 7px 10px;
            }

            .result-item i {
                font-size: 1.2rem;
            }

            .result-number {
                font-size: 0.9rem;
            }

            .total-weight strong {
                font-size: 1.2rem;
            }

            .total-weight i {
                font-size: 1.4rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="javascript:history.back()" class="back-icon">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h2>ผลลัพธ์การแนะนำปุ๋ย</h2>
        <div class="result-box">
            <div class="result-item">
                <i class="bi bi-droplet-half"></i>
                <strong>(Urea) 46-0-0</strong>
                <span class="result-number">{{ $fertilizer_46_0_0 ?? 0 }} กก.</span>
            </div>
            <div class="result-item">
                <i class="bi bi-droplet-half"></i>
                <strong>(DAP) 18-46-0</strong>
                <span class="result-number">{{ $fertilizer_18_46_0 ?? 0 }} กก.</span>
            </div>
            <div class="result-item">
                <i class="bi bi-droplet-half"></i>
                <strong>(MOP) 0-0-60</strong>
                <span class="result-number">{{ $fertilizer_0_0_60 ?? 0 }} กก.</span>
            </div>
        </div>

        <!-- ปุ่มสั่งซื้อปุ๋ย -->
        <form action="{{ route('user.orders.product_list') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary mt-3">สั่งซื้อปุ๋ย</button>
        </form>

        <!-- ปุ่มกลับไปหน้าหลัก -->
        <a href="{{ route('user.dashboard') }}" class="btn btn-primary mt-3">กลับไปหน้าหลัก</a>
    </div>
</body>

</html>
