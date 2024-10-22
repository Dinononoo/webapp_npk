<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Fertilizer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #56ab2f; /* เปลี่ยนพื้นหลังเป็นสีเดียว */
            color: white;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 20px;
        }
        .container {
            max-width: 1200px;
            width: 100%;
            padding: 20px;
            position: relative;
        }
        .product-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 40px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .top-icons {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 20px;
        }
        .back-button, .cart-button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s, transform 0.3s;
            cursor: pointer;
        }
        .back-button:hover, .cart-button:hover {
            background-color: rgba(255, 255, 255, 0.4);
            transform: scale(1.1);
        }
        .back-button i, .cart-button i {
            font-size: 24px;
            color: white;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }
        .product-item {
            transition: transform 0.3s, box-shadow 0.3s;
            width: 100%;
            max-width: 300px;
            background: rgba(255, 255, 255, 0.2); /* เปลี่ยนความโปร่งใสให้เหมือนหน้า Menu */
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: inherit;
            margin: 20px 0;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .product-item:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            text-decoration: none;
        }
        .product-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 15px;
            border-radius: 15px;
            transition: transform 0.3s;
            cursor: pointer;
        }
        .product-item img:hover {
            transform: scale(1.05);
        }
        .product-item .text {
            display: inline-block;
            padding: 10px 20px;
            background-color: white;
            color: #56ab2f;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
            margin-bottom: 10px;
        }
        .product-item .text:hover {
            background-color: #f0f0f0;
            color: #3c8c1e;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }
        .product-item .price {
            display: inline-block;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }
        .product-item .price:hover {
            background-color: rgba(255, 255, 255, 1);
            color: #000;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            width: 100%;
            text-align: left;
        }
        .form-group label {
            color: #333;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .form-group label i {
            margin-right: 5px;
        }
        .form-control {
            border-radius: 30px;
            padding: 10px 20px;
            border: 1px solid #ddd;
            transition: border-color 0.3s, box-shadow 0.3s;
            text-align: center;
        }
        .form-control:focus {
            border-color: #56ab2f;
            box-shadow: 0 0 10px rgba(86, 171, 47, 0.2);
        }
        .btn-primary {
            background-color: #56ab2f;
            border-color: #56ab2f;
            width: 100%;
            border-radius: 30px;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 10px 20px;
            transition: background-color 0.3s, border-color 0.3s, transform 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-primary:hover {
            background-color: #3c8c1e;
            border-color: #3c8c1e;
            transform: scale(1.05);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
        }
        .btn-primary i {
            margin-right: 5px;
        }
        .icon-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .icon-container i {
            font-size: 1.5rem;
            color: #56ab2f;
            margin-right: 10px;
        }
        .icon-container:hover i {
            color: #3c8c1e;
        }
        .quantity-selector {
            display: flex;
            align-items: center;
        }
        .quantity-selector button {
            border: none;
            background: none;
            font-size: 1.5rem;
            color: #fff;
            margin: 0 10px;
            cursor: pointer;
            transition: color 0.3s;
        }
        .quantity-selector button:hover {
            color: #3c8c1e;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-icons">
            <a href="{{ route('purchase.menu') }} " class="back-button">
                <i class="bi bi-arrow-left"></i>
            </a>
            <a href="{{ route('cart.index') }}" class="cart-button">
                <i class="bi bi-cart"></i>
            </a>
        </div>
        <div class="product-title">Buy Fertilizer</div>
        <div class="product-list">
            @foreach ($products as $product)
                <div class="product-item">
                    <a href="{{ route('product.show', $product->id) }}" target="_blank">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    </a>
                    <div class="icon-container">
                        <i class="bi bi-leaf"></i>
                        <div class="text">{{ $product->name }}</div>
                    </div>
                    <div class="price">{{ $product->price }} บาท</div>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group">
                            <label for="quantity"><i class="bi bi-bag-fill"></i> จำนวน</label>
                            <div class="quantity-selector">
                                <button type="button" class="quantity-decrease">-</button>
                                <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1" readonly>
                                <button type="button" class="quantity-increase">+</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">
                            <i class="bi bi-cart-plus"></i> เพิ่มเข้าตระกร้า
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.quantity-decrease').forEach(function(button) {
                button.addEventListener('click', function() {
                    var input = this.nextElementSibling;
                    var value = parseInt(input.value) || 1;
                    if (value > 1) {
                        input.value = value - 1;
                    }
                });
            });

            document.querySelectorAll('.quantity-increase').forEach(function(button) {
                button.addEventListener('click', function() {
                    var input = this.previousElementSibling;
                    var value = parseInt(input.value) || 1;
                    input.value = value + 1;
                });
            });
        });
    </script>
</body>
</html>
