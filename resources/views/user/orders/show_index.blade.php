<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดคำสั่งซื้อ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f5f2;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            margin-top: 20px;
            margin-bottom: 20px;
            max-width: 900px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            border: none;
            background-color: #fff;
        }

        .card-header {
            background: linear-gradient(135deg, #2d98da, #227093);
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            padding: 10px 0;
            border-radius: 12px 12px 0 0;
            position: relative;
        }

        .back-button {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 8px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .list-group-item {
            background-color: #fff;
            border: none;
            border-radius: 12px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .list-group-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .product-details {
            display: flex;
            align-items: center;
        }

        .product-info {
            flex: 1;
        }

        .product-info h5 {
            font-size: 1.2rem;
            margin: 0;
            color: #4b6584;
        }

        .product-info p {
            margin: 5px 0;
            color: #555;
        }

        .product-info small {
            color: #888;
        }

        /* Responsive Design for Mobile */
        @media (max-width: 768px) {
            .card-header {
                font-size: 1rem;
            }

            .container {
                padding: 0 10px;
            }

            .product-details {
                flex-direction: column;
                align-items: flex-start;
            }

            .product-image {
                width: 100%;
                height: auto;
                margin-bottom: 10px;
            }

            .product-info h5 {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                รายละเอียดคำสั่งซื้อ
                <a href="{{ route('user.orders.index') }}" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>

            @if($order->products->isEmpty())
                <div class="empty-message">
                    <p>ไม่มีสินค้าในคำสั่งซื้อนี้</p>
                </div>
            @else
                <ul class="list-group">
                    @foreach($order->products as $product)
                        <li class="list-group-item">
                            <div class="product-details">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                                <div class="product-info">
                                    <h5 class="mb-1">{{ $product->name }}</h5>
                                    <p class="mb-1">จำนวน: {{ $product->pivot->quantity }}</p>
                                    <p class="mb-1">ราคาต่อชิ้น: {{ number_format($product->price, 2) }} ฿</p>
                                    <small>รวม: {{ number_format($product->price * $product->pivot->quantity, 2) }} ฿</small>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif

            <!-- Add pagination and info -->
            @if($order->products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="dataTables_info">
                        Showing {{ $order->products->firstItem() }} to {{ $order->products->lastItem() }} of {{ $order->products->total() }} entries
                    </div>
                    <div>
                        {{ $order->products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>

</html>
