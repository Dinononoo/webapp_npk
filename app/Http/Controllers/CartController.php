<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        return view('user.orders.cart', compact('cartItems', 'totalPrice'));
    }

    public function add(Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // Update existing cart item
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Create new cart item
            $cartItem = new Cart();
            $cartItem->user_id = Auth::id();
            $cartItem->product_id = $request->product_id;
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully');
    }

    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully');
    }

 public function checkout()
{
    $cartItems = Cart::where('user_id', Auth::id())->get();
    $totalPrice = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });
    $products = Product::whereIn('id', $cartItems->pluck('product_id'))->get(); // ดึงข้อมูล product ทั้งหมดที่อยู่ใน cart
    return view('user.orders.checkout', compact('cartItems', 'totalPrice', 'products')); // ส่ง products ไปยัง view
}

    
public function processCheckout(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
    ]);

    $cartItems = Cart::where('user_id', Auth::id())->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty');
    }

    try {
        DB::beginTransaction();

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->total_price = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $order->status = 'pending';
        $order->save();

        foreach ($cartItems as $item) {
            DB::table('order_product')->insert([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $item->delete();
        }

        DB::commit();

        return redirect()->route('payment', ['order' => $order->id])->with('success', 'Checkout processed successfully');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('cart.index')->with('error', 'An error occurred during checkout. Please try again.');
    }
}


public function payment($orderId)
{
    // ดึงค่า qrcode_path จากฐานข้อมูล
    $qrcodePath = DB::table('settings')->where('key', 'qrcode_path')->value('value') ?? 'qrcodes/default.png';

    $order = Order::findOrFail($orderId);

    return view('user.orders.payment', compact('order', 'qrcodePath'));
}




    public function processPayment(Request $request, Order $order)
    {
        $request->validate([
            'payment_slip' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('payment_slip')) {
            $path = $request->file('payment_slip')->store('payment_slips', 'public');
            $order->payment_slip = $path;
            $order->status = 'paid';
            $order->save();
        }

        return redirect()->route('user.dashboard')->with('success', 'Payment processed successfully');
    }

    public function uploadQRCode()
    {
        $qrcodePath = session('qrcode_path', null);
        return view('admin.orders.upload_qrcode', compact('qrcodePath'));
    }

    public function processUploadQRCode(Request $request)
    {
        $request->validate([
            'qrcode' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('qrcode')) {
            $path = $request->file('qrcode')->store('qrcodes', 'public');
            session(['qrcode_path' => $path]);

            return redirect()->route('admin.upload.qrcode')->with('success', 'QR Code uploaded successfully')->with('qrcode_path', $path);
        }

        return redirect()->route('admin.upload.qrcode')->with('error', 'Failed to upload QR Code');
    }
}
