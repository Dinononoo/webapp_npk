<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>คำนวณสูตรปุ๋ย</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(to bottom, #a8e063, #56ab2f);
            color: white;
            text-align: center;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        .back-btn {
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 2.5rem;
            position: absolute;
            top: 20px;
            left: 20px;
            transition: color 0.3s ease;
            z-index: 1000;
        }

        .back-btn:hover {
            color: #000;
        }

        .menu-items {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            width: 100%;
            max-width: 1200px;
            margin-top: 80px;
        }

        .menu-item {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            backdrop-filter: blur(10px);
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .menu-item:hover {
            transform: translateY(-10px);
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to right, #ff7e00, #ffba00);
        }

        .menu-item img {
            width: 120px;
            height: 120px;
            margin-bottom: 25px;
            border-radius: 50%;
            border: 6px solid white;
            background: rgba(255, 255, 255, 0.3);
            padding: 15px;
            transition: background 0.3s, transform 0.3s;
        }

        .menu-item:hover img {
            background: rgba(255, 255, 255, 0.6);
            transform: scale(1.1);
        }

        .menu-item .text {
            background-color: white;
            color: #56ab2f;
            padding: 15px 20px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, color 0.3s;
            width: 100%;
            white-space: normal;
        }

        .menu-item:hover .text {
            background-color: #ff7e00;
            color: white;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .menu-items {
                grid-template-columns: 1fr;
            }

            .menu-item {
                max-width: none;
                padding: 25px;
            }

            .menu-item img {
                width: 100px;
                height: 100px;
            }

            .menu-item .text {
                font-size: 1rem;
                padding: 12px 18px;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .menu-items {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1025px) {
            .menu-items {
                grid-template-columns: repeat(2, 1fr);
            }

            .menu-item {
                max-width: 500px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{route('user.dashboard') }}" class="back-btn">
            <i class="bi bi-arrow-left-circle-fill"></i>
        </a>

        <div class="menu-items">
            <a href="{{ route('fertilizer.formula') }}" class="menu-item">
                <img src="{{ asset('images/NPK-Sensor-Photoroom.png') }}" alt="คำนวณตามค่าวิเคราะห์ดิน">
                <div class="text">คำนวณสูตรปุ๋ยสั่งตัดตามค่าวิเคราะห์ดิน</div>
            </a>
            <a href="{{ route('fertilizer.custom.form') }}" class="menu-item">
                <img src="{{ asset('images/Calculator-Photoroom.png') }}" alt="คำนวณสูตรปุ๋ยสั่งตัด">
                <div class="text">คำนวณสูตรปุ๋ยสั่งตัดด้วยตัวเอง</div>
            </a>
            <a href="{{ route('user.fertilizer.sensor_history') }}" class="menu-item">
                <img src="{{ asset('images\history npk-Photoroom.png') }}" alt="ประวัติการคำนวณจากเซ็นเซอร์ NPK">
                <div class="text">ประวัติการคำนวณจากเซ็นเซอร์ NPK</div>
            </a>
            <a href="{{ route('fertilizer.customHistory') }}" class="menu-item">
                <img src="{{ asset('images\history_customer-Photoroom.png') }}" alt="ประวัติการคำนวณด้วยตัวเอง">
                <div class="text">ประวัติการคำนวณด้วยตัวเอง</div>
            </a>
        </div>
    </div>
</body>

</html>