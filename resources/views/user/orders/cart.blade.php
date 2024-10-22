<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #eef2f7;
            font-family: 'Poppins', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        @media (max-width: 768px) {
            .container {
                max-width: 100%; /* ให้ขนาดเต็มจอ */
                margin: 20px auto;
                padding-left: 10px;
                padding-right: 10px;
            }
        }

        .card-header {
            background-color: #47a447;
            color: white;
            font-size: 1.8rem;
            font-weight: 600;
            text-align: center;
            padding: 15px;
            border-radius: 15px 15px 0 0;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
            white-space: nowrap; /* ป้องกันข้อความตกบรรทัด */
        }

        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .product-image:hover {
            transform: scale(1.1);
        }

        .total-row td {
            font-weight: bold;
            background-color: #e8f5e9;
        }

        .btn-primary {
            background-color: #47a447;
            border-color: #47a447;
            border-radius: 30px;
            font-size: 1.2rem;
            font-weight: 600;
            padding: 10px 25px;
            transition: all 0.3s ease;
            width: 100%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #388E3C;
            border-color: #388E3C;
            transform: translateY(-3px);
        }

        .delete-icon {
            color: #dc3545;
            cursor: pointer;
            transition: color 0.3s, transform 0.3s;
        }

        .delete-icon:hover {
            color: #c82333;
            transform: scale(1.2);
        }

        /* ปุ่มย้อนกลับ */
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

        .back-button {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: background-color 0.3s, transform 0.3s;
            text-align: center;
        }

        .card-body p {
            text-align: center;
            color: #757575;
            font-size: 1.2rem;
        }

        .card-body table {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .container {
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .product-image {
                width: 50px;
                height: 50px;
            }

            .btn-primary {
                font-size: 1rem;
                padding: 8px 20px;
            }

            .card-header {
                font-size: 1.5rem;
                padding: 10px 0;
            }

            .table th, .table td {
                font-size: 0.9rem;
                white-space: normal; /* ป้องกันข้อความตกบรรทัด */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- ปุ่มย้อนกลับ -->
        <a href="javascript:history.back()" class="btn-back mb-3">
            <i class="fas fa-arrow-left"></i> <!-- ไอคอนย้อนกลับ -->
        </a>

        <div class="card">
            <div class="card-header">
                รายการสั่งซื้อ
            </div>
            <div class="card-body">
                @if($cartItems->isEmpty())
                    <p>ไม่มีสินค้าภายในตระกร้า</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>รูปสินค้า</th>
                                <th>ชื่อรายการ</th>
                                <th>ราคา</th>
                                <th>จำนวน</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr data-id="{{ $item->id }}" data-price="{{ $item->product->price }}">
                                    <td>
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="product-image">
                                    </td>
                                    <td>{{ $item->product->name }}</td>
                                    <td class="price">{{ $item->product->price }} บาท</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0">
                                                <i class="bi bi-trash-fill delete-icon"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="total-row">
                                <td colspan="4">รวมราคา</td>
                                <td id="total-price">{{ $totalPrice }} บาท</td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="{{ route('checkout') }}" method="GET">
                        <button type="submit" class="btn btn-primary mt-4">สั่งซื้อ</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
