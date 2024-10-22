@extends('layout.app')

@section('title', 'สร้างคำสั่งซื้อ')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">สร้างคำสั่งซื้อ</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('user.orders.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="product_id">สินค้า</label>
                    <select class="form-control" id="product_id" name="product_id" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->price }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">จำนวน</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                </div>
                <div class="form-group">
                    <label for="address">ที่อยู่</label>
                    <textarea class="form-control" id="address" name="address" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">สั่งซื้อ</button>
            </form>
        </div>
    </div>
</div>
@endsection
