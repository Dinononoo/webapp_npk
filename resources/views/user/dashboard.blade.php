<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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
            position: relative;
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
            width: 350px;
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
            background: linear-gradient(to right, #ff7e00, #ffba00);
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
            white-space: nowrap;
        }

        .menu-item .text:hover {
            background-color: #ff7e00;
            color: white;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }

        .logout {
            margin-top: 20px;
            font-size: 1.4rem;
            color: white;
            cursor: pointer;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.15);
            padding: 15px 40px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            transition: background 0.3s, transform 0.3s, color 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .logout:hover {
            background: linear-gradient(to right, #ff7e00, #ffba00);
            color: white;
            transform: scale(1.05);
        }

        .logout i {
            margin-right: 10px;
            font-size: 1.8rem;
        }

        /* Adjustments for screens wider than 1200px */
        @media (min-width: 768px) {
            .menu-items {
                justify-content: center;
            }

            .menu-item {
                flex: 0 1 calc(50% - 40px);
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

            .logout {
                font-size: 1.2rem;
                padding: 10px 20px;
            }

            .logout i {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="menu-items">
            <!-- Menu item 1 -->
            <a href="{{ route('calculation.menu') }}" class="menu-item">
                <img src="{{ asset('images/fertilizer_formula.png') }}" alt="คำนวณสูตรปุ๋ย">
                <div class="text">คำนวณสูตรปุ๋ย</div>
            </a>
            <!-- Menu item 2 -->
            <a href="{{ route('purchase.menu') }}" class="menu-item">
                <img src="{{ asset('images/fertilizer_buy.png') }}" alt="สั่งซื้อปุ๋ย">
                <div class="text">สั่งซื้อปุ๋ย</div>
            </a>
        </div>

        <!-- Logout button -->
        <a href="#" class="logout" onclick="document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i>
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</body>

</html>
