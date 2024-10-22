<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลือกพืชที่ต้องการ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #a8e063, #56ab2f);
            display: flex;
            justify-content: center;
            align-items: center;
            /* เปลี่ยนจาก flex-start เป็น center เพื่อจัดกึ่งกลางแนวตั้ง */
            height: 100vh;
            margin: 0;
            color: #fff;
            overflow: auto;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            padding: 30px;
            width: 100%;
            max-width: 800px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            position: relative;
            margin: auto;
            /* เพิ่ม margin auto เพื่อจัดกึ่งกลาง */
            text-align: center;
        }

        .btn-back {
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 38px;
            /* เพิ่มขนาด */
            position: absolute;
            top: 20px;
            left: 20px;
            transition: color 0.3s ease;
        }

        .btn-back:hover {
            color: #000;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 30px;
            font-weight: bold;
            color: #333;
            font-size: 24px;
            /* เพิ่มขนาด */
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            color: #333;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            flex: 1 1 200px;
            max-width: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100px;
            /* ขยายขนาดภาพ */
            height: 100px;
            margin-bottom: 15px;
            display: block;
        }

        .card-title {
            font-size: 16px;
            /* เพิ่มขนาดฟอนต์ */
            font-weight: bold;
            color: #333;
        }

        @media (max-width: 480px) {
            .container {
                margin-top: 20px;
                padding: 10px;
            }

            .btn-back {
                font-size: 30px;
                /* เพิ่มขนาด */
            }

            h2 {
                font-size: 22px;
                /* เพิ่มขนาด */
                margin-top: 10px;
                margin-bottom: 20px;
            }

            .cards-container {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .card {
                width: 90%;
                max-width: 90%;
                padding: 15px;
            }

            .card img {
                width: 90px;
                /* ขยายขนาดภาพเพิ่มเติม */
                height: 90px;
            }

            .card-title {
                font-size: 16px;
                /* เพิ่มขนาดฟอนต์เพิ่มเติม */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ route('fertilizer.formula') }}" class="btn-back">
            <i class="bi bi-arrow-left-circle-fill"></i>
        </a>
        <h2 class="text-center mb-4">เลือกพืชที่ต้องการ</h2>
        <div class="cards-container">
            <div class="card" onclick="selectPlant(1, 'มันสำปะหลัง')">
                <img src="/images/cassava.png" alt="มันสำปะหลัง">
                <div class="card-title">มันสำปะหลัง</div>
            </div>
            <div class="card" onclick="selectPlant(2, 'ข้าวโพด')">
                <img src="/images/corn.png" alt="ข้าวโพด">
                <div class="card-title">ข้าวโพด</div>
            </div>
            <div class="card" onclick="selectPlant(3, 'อ้อย')">
                <img src="/images/sugarcane.png" alt="อ้อย">
                <div class="card-title">อ้อย</div>
            </div>
        </div>
        <form id="plant-form" action="{{ route('fertilizer.stages') }}" method="GET" style="display: none;">
            <input type="hidden" name="plant_id" id="plant_id">
            <input type="hidden" name="plant_name" id="plant_name">
        </form>
    </div>

    <script>
        function selectPlant(id, name) {
            document.getElementById('plant_id').value = id;
            document.getElementById('plant_name').value = name;

            if (id == 1) {
                document.getElementById('plant-form').action = "{{ route('fertilizer.stages') }}";
            } else if (id == 2) {
                document.getElementById('plant-form').action = "{{ route('fertilizer.subPlantSelection') }}";
            } else if (id == 3) {
                document.getElementById('plant-form').action = "{{ route('fertilizer.subPlantSelection') }}";
            }

            document.getElementById('plant-form').submit();
        }
    </script>
</body>

</html>