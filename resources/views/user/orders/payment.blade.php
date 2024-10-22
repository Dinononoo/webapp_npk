<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 500px;
            width: 100%;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 20px;
        }
        h2 {
            font-size: 2rem;
            color: #4CAF50;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .qrcode img {
            width: 100%;
            max-width: 250px;
            height: auto;
            display: block;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: 600;
            color: #333;
            text-align: left;
            width: 100%;
            display: inline-block;
            margin-top: 10px;
        }
        /* ปุ่มเลือกไฟล์ */
        .custom-file-upload {
            display: inline-block;
            padding: 8px 12px; /* เพิ่มขนาดปุ่มให้ใหญ่ขึ้น */
            cursor: pointer;
            background-color: #007bff;
            color: #ffffff;
            border-radius: 30px;
            transition: all 0.3s ease;
            font-size: 1rem; /* ปรับขนาดฟอนต์ให้ใหญ่ขึ้น */
            font-weight: bold;
            margin-top: 10px;
            width: auto; /* ยังคงทำให้ปุ่มสั้น */
        }
        .custom-file-upload:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        input[type="file"] {
            display: none;
        }
        .btn-primary, .btn-success {
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            padding: 10px 20px;
            transition: background-color 0.3s, border-color 0.3s, transform 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 70%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }
        .btn-primary:hover {
            background-color: #388E3C;
            border-color: #388E3C;
            transform: translateY(-3px);
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: translateY(-3px);
        }
        .btn i {
            margin-right: 8px;
        }
        .preview-img {
            max-width: 250px;
            height: auto;
            display: none;
            margin-top: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .instructions {
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h2 {
                font-size: 1.5rem;
            }
            .btn-primary, .btn-success {
                font-size: 0.9rem;
                padding: 8px 15px;
            }
            .custom-file-upload {
                font-size: 0.85rem;
                padding: 6px 10px; /* ลดขนาดปุ่มให้เล็กลงเมื่ออยู่ในจอเล็ก */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>การชำระเงิน</h2>
        <p class="instructions">รวมราคา: {{ $order->total_price }} บาท</p>
        <p class="instructions">สแกนคิวอาร์โค้ดเพื่อชำระเงิน</p>
        <div class="qrcode">
            <img src="{{ asset('storage/' . $qrcodePath) }}" alt="QR Code" class="img-fluid">
        </div>

        <form action="{{ route('payment.process', ['order' => $order->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="payment_slip">อัพโหลดสลิปการชำระเงิน</label>
                <label for="payment_slip" class="custom-file-upload"><i class="fas fa-upload"></i> เลือกไฟล์</label>
                <input type="file" id="payment_slip" name="payment_slip" required onchange="previewImage(event)">
                <img id="slip-preview" class="preview-img" src="#" alt="Payment Slip Preview">
            </div>
            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-check-circle"></i> ยืนยันการชำระเงิน</button>
        </form>

        @if (session('receipt_path'))
            <a href="{{ route('download.receipt', ['order' => $order->id]) }}" class="btn btn-success mt-3"><i class="bi bi-download"></i> ดาวน์โหลดใบเสร็จ</a>
        @endif
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('slip-preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
