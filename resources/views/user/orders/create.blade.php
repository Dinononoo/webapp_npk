<!-- resources/views/user/orders/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Create Order for {{ $product->name }}</h1>
    <form action="{{ route('user.orders.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
        </div>
        <div class="form-group">
            <label for="address">Shipping Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>
</body>
</html>
