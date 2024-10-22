<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลือกชนิดของพืช</title>
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
            overflow: auto;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            padding: 30px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            position: relative;
            text-align: center;
            margin: auto;
        }

        .btn-back {
            background-color: transparent;
            border: none;
            color: #fff;
            font-size: 38px;
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
            width: 200px;
            height: 260px;
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
            height: 100px;
            margin-bottom: 20px;
            display: block;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        @media (max-width: 768px) {
            .container {
                max-width: 100%;
                padding: 20px;
            }

            .card {
                width: 150px;
                height: 220px;
            }

            .card img {
                width: 120px;
                height: 120px;
            }

            .card-title {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ route('fertilizer.plantSelection') }}" class="btn-back">
            <i class="bi bi-arrow-left-circle-fill"></i>
        </a>

        <h2 class="text-center mb-4">เลือกชนิดของพืช</h2>
        <div class="cards-container">
            @foreach($sub_plants as $sub_plant)
            @if($sub_plant->plant_id == $plant_id)
            <div class="card" onclick="selectSubPlant('{{ $sub_plant->id }}', '{{ $sub_plant->sub_plant_name }}')">
                <img src="/images/{{ $sub_plant->sub_plant_name }}-Photoroom.png" alt="{{ $sub_plant->sub_plant_name }}">
                <div class="card-title">{{ $sub_plant->sub_plant_name }}</div>
            </div>
            @endif
            @endforeach
        </div>
        <form id="sub-plant-form" action="{{ route('fertilizer.stageSelection') }}" method="GET" style="display: none;">
            <input type="hidden" name="plant_id" id="plant_id" value="{{ $plant_id }}">
            <input type="hidden" name="sub_plant_id" id="sub_plant_id">
            <input type="hidden" name="sub_plant_name" id="sub_plant_name">
        </form>

    </div>

    <script>
        function selectSubPlant(id, name) {
            document.getElementById('sub_plant_id').value = id;
            document.getElementById('sub_plant_name').value = name;
            document.getElementById('sub-plant-form').submit();
        }
    </script>
</body>

</html>