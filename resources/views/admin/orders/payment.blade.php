<!-- resources/views/user/orders/orders/payment.blade.php -->
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การชำระเงิน</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            font-size: 2.5rem;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        .qrcode img {
            width: 100%;
            max-width: 300px;
            height: auto;
            display: block;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
            color: #333;
            text-align: left;
            width: 100%;
            display: inline-block;
            margin-top: 15px;
        }
        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
            border-radius: 25px;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 10px 25px;
            transition: background-color 0.3s, border-color 0.3s, transform 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .btn-primary:hover {
            background-color: #388E3C;
            border-color: #388E3C;
            transform: translateY(-3px);
        }
        .btn-success {
            border-radius: 25px;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 10px 25px;
            transition: background-color 0.3s, border-color 0.3s, transform 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .btn-success:hover {
            transform: translateY(-3px);
        }
        .btn i {
            margin-right: 5px;
        }
        @media (max-width: 768px) {
            h2 {
                font-size: 2rem;
            }
            .btn-primary, .btn-success {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>การชำระเงิน</h2>
        <p>รวมราคา: {{ $order->total_price }} บาท</p>
        <p>สแกนคิวอาร์โค้ดเพื่อชำระเงิน</p>
        <div class="qrcode">
            <img src="{{ asset('storage/qrcodes/qrcode.png') }}" alt="QR Code">
        </div>
        <form action="{{ route('payment.process', ['order' => $order->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="payment_slip">อัปโหลดสลิปการชำระเงิน</label>
                <input type="file" class="form-control-file" id="payment_slip" name="payment_slip" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-check-circle"></i> ยืนยันการชำระเงิน</button>
        </form>

        @if (session('receipt_path'))
            <a href="{{ route('download.receipt', ['order' => $order->id]) }}" class="btn btn-success mt-3"><i class="bi bi-download"></i> ดาวน์โหลดใบเสร็จ</a>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
