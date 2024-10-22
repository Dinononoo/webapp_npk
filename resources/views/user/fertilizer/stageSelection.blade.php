<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลือกระยะเวลาของพืช</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #a8e063, #56ab2f);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
            overflow: hidden;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 20px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            display: flex;
            align-items: center;
            width: 100%;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .btn-back {
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 42px;
            transition: color 0.3s;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .btn-back:hover {
            color: #000;
        }

        .header h2 {
            font-size: 28px;
            font-weight: bold;
            margin: 0;
            text-align: center;
            white-space: normal;
            word-wrap: break-word;
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            margin: 10px;
            padding: 20px;
            text-align: center;
            color: #000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            flex: 1 1 calc(50% - 20px);
            max-width: calc(50% - 20px);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* เปลี่ยนเป็น center เพื่อจัดให้อยู่กลาง */
            align-items: center;
            /* จัดให้อยู่กลางแนวตั้ง */
            width: 100%;
            height: 100%;
            /* เพิ่มความสูงเพื่อให้จัดกลางแนวตั้ง */
        }


        @media (max-width: 768px) {
            .cards-container {
                flex-direction: column;
                align-items: center;
            }

            .card {
                flex: 1 1 100%;
                max-width: 100%;
                margin: 10px 0;
            }

            .btn-back {
                margin-right: 0;
                font-size: 36px;
            }

            .header h2 {
                font-size: 20px;
                /* ลดขนาดฟอนต์ */
                white-space: nowrap;
                /* ป้องกันการตกบรรทัด */
                overflow: hidden;
                /* ซ่อนข้อความที่ยาวเกินไป */
                margin-left: 10px;
                /* เพิ่มระยะห่างทางซ้ายเพื่อขยับไปฝั่งขวา */
            }

        }
    </style>
</head>

<body>
    <div class="container">
    <div class="header">
    <a href="{{ $plant_name == 'มันสำปะหลัง' ? route('fertilizer.plantSelection') : route('fertilizer.subPlantSelection', ['plant_id' => $plant_id, 'plant_name' => $plant_name]) }}" class="btn-back">
        <i class="bi bi-arrow-left-circle-fill"></i>
    </a>
    <h2 class="text-center">เลือกระยะเวลาของ {{ $sub_plant_name ?? $plant_name }}</h2>
</div>

        <div class="cards-container">
            @foreach ($stages as $stage)
            <div class="card" onclick="selectStage('{{ $stage->id }}')">
                <div class="card-title">{{ $stage->stage_name }}</div>
            </div>
            @endforeach

            <form id="stage-form" action="{{ route('fertilizer.calculate') }}" method="GET" style="display: none;">
                <input type="hidden" name="plant_id" value="{{ $plant_id }}">
                <input type="hidden" name="sub_plant_id" value="{{ $sub_plant_id }}">
                <input type="hidden" name="stage_id" id="stage_id">
            </form>

            <script>
                function selectStage(stageId) {
                    document.getElementById('stage_id').value = stageId;
                    document.getElementById('stage-form').submit();
                }
            </script>

</body>

</html>