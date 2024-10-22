<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=500, initial-scale=1.0">
    <title>คำนวณสูตรปุ๋ย</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #a8e063, #56ab2f);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
            padding: 20px;
        }

        .container {
            background: #fff;
            border-radius: 25px;
            padding: 2.5rem;
            width: 500px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            min-height: calc(100vh - 40px);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .container:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .back-icon {
            position: absolute;
            top: 1.2rem;
            left: 1.2rem;
            font-size: 1.2rem;
            color: #fff;
            cursor: pointer;
            background-color: #56ab2f;
            padding: 0.6rem;
            border-radius: 50%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .back-icon:hover {
            background-color: #4b9e2a;
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .header {
            margin-bottom: 2.5rem;
        }

        h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #444;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        .form-group-inline {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .form-group-inline label {
            font-size: 1rem;
            font-weight: 600;
            color: #666;
            margin-bottom: 0.8rem;
        }

        .form-group-inline input {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            text-align: center;
            border: 2px solid #ddd;
            border-radius: 12px;
            background: #f9f9f9;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group-inline input::placeholder {
            color: #bbb;
        }

        .form-group-inline input:focus {
            border-color: #56ab2f;
            box-shadow: 0 0 10px rgba(86, 171, 47, 0.2);
            outline: none;
        }

        .separator {
            font-size: 1.5rem;
            font-weight: bold;
            color: #56ab2f;
            margin-top: 1rem;
        }

        .form-group {
            margin-bottom: 2.5rem;
        }

        .form-group-label {
            margin-bottom: 4rem;
        }

        /* เพิ่มขนาดฟอนต์สำหรับหัวข้อ */
        .form-group-label h4 {
            font-size: 1.5rem;
            /* เพิ่มขนาดฟอนต์ */
            color: #ff5722;
            font-weight: bold;
            white-space: nowrap;
            margin-bottom: 1rem;
        }

        .form-group input {
            padding: 1rem;
            font-size: 1rem;
            border: 2px solid #ddd;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            background: #f9f9f9;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input::placeholder {
            color: #bbb;
        }

        .form-group input:focus {
            border-color: #56ab2f;
            box-shadow: 0 0 10px rgba(86, 171, 47, 0.2);
        }

        .btn-success {
            background: linear-gradient(135deg, #56ab2f, #4b9e2a);
            border: none;
            font-size: 1.2rem;
            padding: 1.2rem 1.5rem;
            border-radius: 50px;
            color: white;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #4b9e2a, #345168);
            transform: translateY(-5px);
        }

        .btn-success:active {
            transform: translateY(0);
        }

        /* ปรับระยะห่างสำหรับมือถือ */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                min-height: unset;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ route('fertilizer.plantSelection') }}" class="back-icon">
            <i class="bi bi-arrow-left"></i>
        </a>

        <div class="header">
            <h2 class="text-center">{{ $stage_name }}</h2>
        </div>

        <form id="fertilizer-form">
      <input type="hidden" name="recommendedN" value="{{ $recommendedNPK['n'] }}">
    <input type="hidden" name="recommendedP" value="{{ $recommendedNPK['p'] }}">
    <input type="hidden" name="recommendedK" value="{{ $recommendedNPK['k'] }}">
    <input type="hidden" name="plant_id" value="{{ $plant_id }}">
    <input type="hidden" name="sub_plant_id" value="{{ $sub_plant_id }}">
    <input type="hidden" name="stage_id" value="{{ $stage_id }}">
    <input type="hidden" name="averageN" value="{{ $averages['averageN'] }}">
    <input type="hidden" name="averageP" value="{{ $averages['averageP'] }}">
    <input type="hidden" name="averageK" value="{{ $averages['averageK'] }}">

            <div class="form-group-label">
                <h4>NPK วัดได้จากเซนเซอร์</h4>
                <div class="form-row">
                    <div class="form-group-inline">
                        <label for="measured_npk">N</label>
                        <input type="text" class="form-control" id="measured_npk" value="{{ round($averages['averageN'], 2) }}" readonly>
                    </div>
                    <span class="separator">-</span>
                    <div class="form-group-inline">
                        <label for="measured_npk">P</label>
                        <input type="text" class="form-control" id="measured_npk" value="{{ round($averages['averageP'], 2) }}" readonly>
                    </div>
                    <span class="separator">-</span>
                    <div class="form-group-inline">
                        <label for="measured_npk">K</label>
                        <input type="text" class="form-control" id="measured_npk" value="{{ round($averages['averageK'], 2) }}" readonly>
                    </div>
                </div>
            </div>

            <div class="form-group-label">
                <h4>NPK ที่เหมาะสม</h4>
                <div class="form-row">
                    <div class="form-group-inline">
                        <label for="recommended_npk">N</label>
                        <input type="text" class="form-control" id="recommended_npk" value="{{ $recommendedNPK['n'] }}" readonly>
                    </div>
                    <span class="separator">-</span>
                    <div class="form-group-inline">
                        <label for="recommended_npk">P</label>
                        <input type="text" class="form-control" id="recommended_npk" value="{{ $recommendedNPK['p'] }}" readonly>
                    </div>
                    <span class="separator">-</span>
                    <div class="form-group-inline">
                        <label for="recommended_npk">K</label>
                        <input type="text" class="form-control" id="recommended_npk" value="{{ $recommendedNPK['k'] }}" readonly>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-success" onclick="calculateFertilizer()">แนะนำปุ๋ย</button>
        </form>
    </div>

    <script>
function calculateFertilizer() {
    var formData = new FormData(document.getElementById('fertilizer-form'));

    var button = document.querySelector('.btn-success');
    button.disabled = true;  // ปิดการใช้งานปุ่มเพื่อป้องกันการกดซ้ำ

    fetch("{{ route('fertilizer.recommend') }}", {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.message) {
            alert(data.message);
        } else {
            window.location.href = '{{ route("fertilizer.result") }}?' + new URLSearchParams({
                fertilizer_46_0_0: data.fertilizer_46_0_0,
                fertilizer_18_46_0: data.fertilizer_18_46_0,
                fertilizer_0_0_60: data.fertilizer_0_0_60,
                stage_id: formData.get('stage_id'),
                plant_id: formData.get('plant_id'),
                sub_plant_id: formData.get('sub_plant_id')
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('There was a problem with the recommendation process.');
        button.disabled = false;  // เปิดใช้งานปุ่มอีกครั้งหากเกิดข้อผิดพลาด
    });
}



    </script>
</body>

</html>