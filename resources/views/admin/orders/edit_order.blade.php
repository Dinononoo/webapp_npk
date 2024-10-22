<!-- resources/views/admin/orders/edit_order.blade.php -->
@extends('layout.app')

@section('title', 'แก้ไขคำสั่งซื้อ')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">แก้ไขคำสั่งซื้อ</div>
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
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">สถานะ</label>
                    <select class="form-control" id="status" name="status">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>รอดำเนินการ</option>
                        <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>อนุมัติแล้ว</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>จัดส่งแล้ว</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>จัดส่งสำเร็จ</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>ยกเลิก</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="payment_slip">สลิปการชำระเงิน (ถ้ามี)</label>
                    <input type="file" class="form-control" id="payment_slip" name="payment_slip">
                </div>
                <button type="submit" class="btn btn-primary">อัปเดตคำสั่งซื้อ</button>
            </form>
        </div>
    </div>
</div>
@endsection
