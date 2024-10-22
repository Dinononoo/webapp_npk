<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=500, initial-scale=1.0">
    <title>คำนวณสูตรปุ๋ยเอง</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;500;700&display=swap" rel="stylesheet">
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
            background: #fff;
            border-radius: 25px;
            padding: 2rem;
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
            background-color: #4e89ae;
            padding: 0.6rem;
            border-radius: 50%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .back-icon:hover {
            background-color: #3b6c8a;
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .header {
            margin-bottom: 2rem;
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
            margin-bottom: 2rem;
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
            margin-bottom: 0.5rem;
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
            border-color: #4e89ae;
            box-shadow: 0 0 10px rgba(78, 137, 174, 0.2);
            outline: none;
        }

        .separator {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4e89ae;
            margin-top: 1rem;
        }

        .form-group {
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-group label {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 1rem;
            display: block;
        }

        .form-group input {
            padding: 1rem;
            font-size: 1rem;
            border: 2px solid #ddd;
            border-radius: 12px;
            width: 80%; /* ลดขนาดเพื่อให้ดูเป็นระเบียบและจัดกลาง */
            text-align: center;
            background: #f9f9f9;
            margin: 0 auto; /* จัดให้อยู่ตรงกลาง */
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input::placeholder {
            color: #bbb;
        }

        .form-group input:focus {
            border-color: #4e89ae;
            box-shadow: 0 0 10px rgba(78, 137, 174, 0.2);
        }

        .btn-success {
            background: linear-gradient(135deg, #4e89ae, #3b6c8a);
            border: none;
            font-size: 1.2rem;
            padding: 1rem 1.5rem;
            border-radius: 50px;
            color: white;
            width: 100%;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #3b6c8a, #345168);
            transform: translateY(-5px);
        }

        .btn-success:active {
            transform: translateY(0);
        }

        .form-group-label h4 {
            margin: 0;
            font-size: 1.2rem;
            color: #ff5722;
            font-weight: bold;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                min-height: unset;
            }

            .form-group input {
                width: 100%; /* เพิ่มเติมสำหรับหน้าจอขนาดเล็ก */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ route('calculation.menu') }}" class="back-icon">
            <i class="bi bi-arrow-left"></i>
        </a>

        <div class="header">
            <h2 class="text-center">คำนวณสูตรปุ๋ย</h2>
        </div>

        <form action="{{ route('fertilizer.custom.calculate') }}" method="POST" id="fertilizer-form">
            @csrf
            <div class="form-group-label">
                <h4>สูตรปุ๋ย</h4>
                <div class="form-row">
                    <div class="form-group-inline">
                        <label for="nitrogen">N</label>
                        <input type="number" step="0.01" class="form-control" id="nitrogen" name="nitrogen" placeholder="กรอก" required>
                    </div>
                    <span class="separator">-</span>
                    <div class="form-group-inline">
                        <label for="phosphorus">P</label>
                        <input type="number" step="0.01" class="form-control" id="phosphorus" name="phosphorus" placeholder="กรอก" required>
                    </div>
                    <span class="separator">-</span>
                    <div class="form-group-inline">
                        <label for="potassium">K</label>
                        <input type="number" step="0.01" class="form-control" id="potassium" name="potassium" placeholder="กรอก" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="weight">น้ำหนักปุ๋ยที่ต้องการ (กิโลกรัม)</label>
                <input type="number" class="form-control" id="weight" name="weight" placeholder="กรอกน้ำหนักปุ๋ยที่ต้องการ" required>
            </div>

            <button type="submit" class="btn btn-success">คำนวณ</button>
        </form>
    </div>
</body>

</html>
