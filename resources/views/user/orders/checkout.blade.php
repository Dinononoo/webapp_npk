<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #eef2f7;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin-top: 60px;
            margin-bottom: 60px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        @media (max-width: 768px) {
            .container {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        .card-header {
            background-color: #47a447;
            color: #fff;
            font-size: 1.8rem;
            font-weight: 600;
            text-align: center;
            padding: 15px;
            border-radius: 15px 15px 0 0;
            letter-spacing: 1px;
        }

        .form-group label {
            font-weight: 500;
            font-size: 1.1rem;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #47a447;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #47a447;
            border-color: #47a447;
            border-radius: 30px;
            font-size: 1.2rem;
            font-weight: 600;
            padding: 12px 20px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #3b8e3b;
            border-color: #3b8e3b;
            transform: translateY(-2px);
        }

        .btn-primary:active {
            transform: scale(0.98);
        }

        .container-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #666;
        }

        .btn-back {
            background: linear-gradient(135deg, #6c757d, #343a40);
            color: #fff;
            border: none;
            border-radius: 50%; /* ทำให้เป็นปุ่มวงกลม */
            padding: 10px;
            font-size: 1.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-decoration: none; /* เอาเส้นใต้ลิงก์ออก */
        }

        .btn-back:hover {
            background: linear-gradient(135deg, #5a6268, #23272b);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .btn-back:active {
            transform: scale(0.98);
        }

        .btn-back i {
            margin-right: 0; /* ทำให้ไอคอนอยู่ตรงกลาง */
        }

        /* เพิ่มการโฟกัสให้องค์ประกอบฟอร์ม */
        .form-control:focus {
            outline: none;
            border-color: #47a447;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- ปุ่มย้อนกลับ -->
        <a href="javascript:history.back()" class="btn-back mb-3">
            <i class="fas fa-arrow-left"></i>
        </a>

        <div class="card">
            <div class="card-header">
                ที่อยู่จัดส่ง
            </div>
            <div class="card-body">
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    @foreach($cartItems as $item)
                        <input type="hidden" name="product_id[]" value="{{ $item->product_id }}">
                    @endforeach
                    <div class="form-group">
                        <label for="name">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="address">ที่อยู่</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">ชำระเงิน</button>
                </form>
            </div>
        </div>
        <div class="container-footer">
            <p>ขอขอบคุณสำหรับการสั่งซื้อของคุณ!</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
