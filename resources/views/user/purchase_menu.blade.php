<!-- resources\views\user\purchase_menu.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สั่งซื้อปุ๋ย</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(to bottom, #a8e063, #56ab2f); /* Green background */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 50px;
            width: 90%;
            max-width: 1200px;
            position: relative; /* Make the container relative for absolute positioning */
        }

        /* Back button styling */
        .back-btn {
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 38px;
            position: absolute;
            top: -20px; /* Moved up further */
            left: 0px; /* Moved left */
            transition: color 0.3s ease;
        }

        .back-btn:hover {
            color: #000;
        }

        .menu-items {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            justify-content: space-evenly;
            max-width: 1000px;
            width: 100%;
        }

        .menu-item {
            transition: transform 0.3s, box-shadow 0.3s;
            width: 350px; /* Increased the width */
            background: rgba(255, 255, 255, 0.15);
            padding: 20px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: inherit;
            box-sizing: border-box;
            border: none;
        }

        .menu-item:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to right, #ff7e00, #ffba00); /* Orange hover effect */
            color: white;
        }

        .menu-item img {
            width: 100px;
            height: 100px;
            margin-bottom: 15px;
            border-radius: 50%;
            border: 4px solid white;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px;
            transition: background 0.3s, transform 0.3s;
        }

        .menu-item img:hover {
            background: rgba(255, 255, 255, 0.5);
            transform: scale(1.1);
        }

        .menu-item .text {
            display: inline-block;
            padding: 12px 15px;
            background-color: white;
            color: #56ab2f;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
            text-align: center;
            width: 100%;
            white-space: nowrap; /* Prevent line break */
        }

        .menu-item .text:hover {
            background-color: #ff7e00;
            color: white;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }

        /* Adjustments for screens wider than 1200px */
        @media (min-width: 768px) {
            .menu-items {
                justify-content: center;
            }

            .menu-item {
                flex: 0 1 calc(50% - 40px); /* Take up half the width with some space between items */
            }
        }

        /* Adjustments for smaller screens */
        @media (max-width: 768px) {
            .menu-items {
                flex-wrap: wrap;
                justify-content: center;
            }

            .menu-item {
                width: 100%;
                max-width: 350px;
                padding: 15px;
                background-color: rgba(255, 255, 255, 0.15);
                border: none;
                color: inherit;
            }

            .menu-item img {
                width: 80px;
                height: 80px;
            }

            .menu-item .text {
                padding: 5px 10px;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Back button at the top-left -->
        <a href="{{route('user.dashboard') }}" class="back-btn">
            <i class="bi bi-arrow-left-circle-fill"></i>
        </a>

        <div class="menu-items">
            <!-- เชื่อมโยงไปยังหน้าแสดงรายการสินค้า (product_list.blade.php) -->
            <a href="{{ route('user.orders.product_list') }}" class="menu-item">
                <img src="{{ asset('images/cheakstatus.png') }}" alt="เลือกซื้อปุ๋ย">
                <div class="text">เลือกซื้อปุ๋ย</div>
            </a>
            <!-- เชื่อมโยงไปยังหน้าเช็คสถานะคำสั่งซื้อ -->
            <a href="{{ route('user.orders.index') }}" class="menu-item">
                <img src="{{ asset('images/history.png') }}" alt="เช็คสถานะการจัดส่ง">
                <div class="text">เช็คสถานะการจัดส่ง</div>
            </a>
        </div>
    </div>
</body>

</html>
