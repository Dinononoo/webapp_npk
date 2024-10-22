<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #56ab2f; /* เปลี่ยนพื้นหลังเป็นสีเดียว */
            color: #333;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 20px;
        }
        .container {
            max-width: 800px;
            width: 100%;
            padding: 20px;
        }
        .product-image {
            width: 100%;
            max-height: 300px; /* ปรับขนาดของรูปภาพใน PC */
            object-fit: contain; /* ทำให้รูปภาพคงอัตราส่วนและไม่ยืด */
            border-radius: 15px;
            margin-bottom: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product-image:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }
        .product-details {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product-details:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.15);
        }
        .product-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #388e3c;
        }
        .product-description {
            margin-bottom: 20px;
            text-align: left;
            color: #555;
            line-height: 1.6;
        }
        .product-price {
            font-size: 2rem;
            color: #d32f2f;
            margin-bottom: 20px;
        }
        .btn-secondary {
            background-color: #0288d1;
            border-color: #0288d1;
            border-radius: 30px;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 10px 20px;
            transition: background-color 0.3s, border-color 0.3s, transform 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            color: white;
            text-decoration: none;
        }
        .btn-secondary:hover {
            background-color: #0277bd;
            border-color: #0277bd;
            transform: scale(1.05);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }
        .btn-secondary i {
            margin-right: 5px;
        }
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            .product-title {
                font-size: 2rem;
            }
            .product-description {
                font-size: 0.9rem;
            }
            .product-price {
                font-size: 1.5rem;
            }
            .btn-secondary {
                font-size: 1rem;
                padding: 8px 15px;
            }
            .product-image {
                max-height: 400px; /* ปรับขนาดรูปภาพสำหรับมือถือ */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="product-details">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
            <div class="product-title">{{ $product->name }}</div>
            <div class="product-description">{{ $product->description }}</div>
            <div class="product-price">{{ $product->price }} บาท</div>
            <a href="{{ route('product.list') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Back to Products
            </a>
        </div>
    </div>
</body>
</html>
