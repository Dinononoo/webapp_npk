<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function adminIndex()
{
    $orders = Order::with('user', 'products')->paginate(10);
    return view('admin.orders.manage_orders', compact('orders'));
}


    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('user.orders.create', compact('product'));
    }


    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->user_id,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'address' => $request->address,
            'payment_slip' => $request->payment_slip,
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        foreach ($request->products as $product) {
            $order->products()->attach($product['product_id'], ['quantity' => $product['quantity']]);
        }

        return redirect()->route('orders.show', $order->id)->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all();
        return view('admin.orders.edit_order', compact('order', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'payment_slip' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        if ($request->hasFile('payment_slip')) {
            $file = $request->file('payment_slip');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/payment_slips'), $filename);
            $order->payment_slip = 'payment_slips/' . $filename;
        }
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }

    public function productList()
    {
        $products = Product::all();
        return view('user.orders.product_list', compact('products'));
    }


    
    public function checkout($productId)
    {
        $product = Product::findOrFail($productId);
        return view('user.orders.checkout', compact('product'));
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
    

    public function uploadQRCode()
    {
        // ดึงเส้นทาง QR Code จาก session หรือให้ default เป็น 'qrcodes/default.png' ถ้าไม่มีการอัปโหลดไฟล์มาก่อน
        $qrcodePath = session('qrcode_path') ?? 'qrcodes/default.png';
        return view('admin.orders.upload_qrcode', compact('qrcodePath'));
    }

    public function processUploadQRCode(Request $request)
    {
        $request->validate([
            'qrcode' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('qrcode')) {
            // บันทึกไฟล์ QR Code ไว้ใน public storage
            $path = $request->file('qrcode')->store('qrcodes', 'public');

            // เก็บเส้นทางไฟล์ QR Code ไว้ใน session เพื่อดึงมาแสดงผล
            session(['qrcode_path' => $path]);

            return redirect()->route('admin.upload.qrcode')->with('success', 'QR Code uploaded successfully');
        }

        return redirect()->route('admin.upload.qrcode')->with('error', 'Failed to upload QR Code');
    }
    
    
    

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }

    // public function processPayment(Request $request, Order $order)
    // {
    //     $request->validate([
    //         'payment_slip' => 'required|image|max:2048',
    //     ]);
    
    //     if ($request->hasFile('payment_slip')) {
    //         $path = $request->file('payment_slip')->store('payment_slips', 'public');
    //         $order->payment_slip = $path;
    //         $order->status = 'paid';
    //         $order->save();
    //     }
    
    //     return redirect()->route('user.dashboard')->with('success', 'Payment processed successfully');
    // }
    
    // OrderController.php

    public function showSlip($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show_slip', compact('order'));
    }

    public function showAddress($id)
{
    $order = Order::findOrFail($id);
    return view('admin.orders.show_address', compact('order'));
}

public function userOrders()
{
    // ดึงข้อมูลคำสั่งซื้อของผู้ใช้ที่เข้าสู่ระบบโดยเรียงตามวันที่ล่าสุด
    $orders = Order::where('user_id', Auth::id())
                ->orderBy('created_at', 'desc') // เรียงจากคำสั่งซื้อล่าสุดไปยังเก่าสุด
                ->paginate(10); // แบ่งหน้า 10 รายการต่อหน้า

    return view('user.orders.index', compact('orders'));
}
public function index()
{
    // ดึงข้อมูลคำสั่งซื้อของผู้ใช้ที่เข้าสู่ระบบ
    $orders = Order::where('user_id', auth()->id())->paginate(10);
    
    // ส่งข้อมูลไปยัง view สำหรับแสดงสถานะคำสั่งซื้อ
    return view('user.orders.index', compact('orders'));
}


}
