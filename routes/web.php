<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FertilizerController;
use App\Http\Controllers\NPKController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\CustomFertilizerController;

// หน้าเข้าสู่ระบบ
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// หน้าเข้าสู่ระบบของ admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);

// หน้าแดชบอร์ดของ admin
Route::middleware('auth')->group(function () {
    Route::put('admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('admin/manage_users', [UserController::class, 'index'])->name('admin.manage.users');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('admin/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
    Route::get('admin/orders/{order}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('admin/orders/{order}', [OrderController::class, 'update'])->name('admin.orders.update');
});

Route::post('/admin/upload-qrcode', [OrderController::class, 'processUploadQRCode'])->name('admin.upload.qrcode.process');



//สินค้า
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::resource('sensors', SensorController::class);
});

// route สำหรับ logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// หน้าแดชบอร์ดของ user
Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('user/products', [ProductController::class, 'userIndex'])->name('user.products.index');
    Route::get('order/create/{productId}', [OrderController::class, 'create'])->name('user.orders.create');
    Route::post('order', [OrderController::class, 'store'])->name('user.orders.store');
    Route::get('user/orders', [OrderController::class, 'userOrders'])->name('user.orders.index');
    Route::get('/products', [ProductController::class, 'userIndex'])->name('product.list'); // route สำหรับการแสดงรายการสินค้า
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show'); // route สำหรับการแสดงรายละเอียดสินค้า
    Route::get('/checkout/{productId}', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('checkout.process');
});

// Route สำหรับการตรวจสอบ role และเปลี่ยนเส้นทางไปยังแดชบอร์ดที่ถูกต้อง
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role == 'admin') {
        return redirect()->route('admin.manage.users');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware('auth')->name('dashboard');


// Route สำหรับการอัปเดต user_id หลังจากล็อกอิน
Route::middleware(['auth'])->group(function () {
    Route::get('/update-user-id', [SensorDataController::class, 'updateUserId'])->name('updateUserId');
});

Route::get('/fertilizer/history', [FertilizerController::class, 'history'])->name('fertilizer.history');



// Route สำหรับตะกร้าสินค้า
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process', [CartController::class, 'processCheckout'])->name('checkout.process');
Route::get('/payment/{order}', [CartController::class, 'payment'])->name('payment');
Route::post('/payment/{order}/process', [CartController::class, 'processPayment'])->name('payment.process');
Route::get('download-receipt/{order}', [CartController::class, 'downloadReceipt'])->name('download.receipt');

Route::get('/npk', [NPKController::class, 'show'])->name('npk.show');
Route::delete('/npk/{index}', [NPKController::class, 'deletePoint'])->name('npk.delete');
Route::delete('/sensor-data/{index}', [SensorDataController::class, 'destroy'])->name('sensor-data.destroy');

// ข้อมูลที่วัดมาหลังจาก user login
Route::get('/', [SensorDataController::class, 'index']);
Route::post('/sensor-data', [SensorDataController::class, 'store'])->name('sensor-data.store');
Route::get('/fertilizer/formula', [SensorDataController::class, 'show'])->name('fertilizer.formula');
Route::delete('/sensor-data/{index}', [SensorDataController::class, 'destroy'])->name('sensor-data.destroy');
Route::delete('/sensor-data/{id}', [SensorDataController::class, 'destroy'])->name('sensor-data.destroy');
Route::get('/update-user-id', [NPKController::class, 'updateUserId'])->name('updateUserId');

//mange sensors
Route::get('/sensor-data', [SensorDataController::class, 'show'])->name('sensorData.show');
Route::get('/admin/npks', [SensorController::class, 'showNpk'])->name('admin.npks.shownpk');
Route::get('/admin/npks/{id}', [SensorController::class, 'show'])->name('admin.npks.show');



Route::get('/admin/upload-qrcode', [OrderController::class, 'uploadQRCode'])->name('admin.upload.qrcode');
// Route::post('/admin/upload-qrcode', [OrderController::class, 'processQRCodeUpload'])->name('admin.upload.qrcode.process');

Route::get('/start-measurement', [SensorDataController::class, 'startMeasurement'])->name('start.measurement');
Route::middleware(['auth'])->group(function () {
    Route::get('/fertilizer/formula', [SensorDataController::class, 'index'])->name('fertilizer.formula');
    Route::get('/fertilizer/formula/show', [SensorDataController::class, 'show'])->name('fertilizer.show');
    Route::delete('/fertilizer/formula/{id}', [SensorDataController::class, 'destroy'])->name('fertilizer.destroy');
});

// เส้นทางสำหรับเลือกพืชที่ต้องการ
Route::get('/fertilizer/plant-selection', [FertilizerController::class, 'plantSelection'])->name('fertilizer.plantSelection');
Route::get('/plant-selection', [FertilizerController::class, 'plantSelection'])->name('plant.selection')->middleware('auth');

// เส้นทางเลือกระยะเวลาของพืช
Route::get('/fertilizer/stage-selection', [FertilizerController::class, 'stageSelection'])->name('fertilizer.stageSelection');
Route::get('/fertilizer/stageSelection', [FertilizerController::class, 'stageSelection'])->name('fertilizer.stageSelection');


Route::get('/fertilizer/sub-plant-selection', [FertilizerController::class, 'subPlantSelection'])->name('fertilizer.subPlantSelection');


// เส้นทางสำหรับหน้าการเลือกพืช
Route::get('/fertilizer/plant-selection', [FertilizerController::class, 'plantSelection'])->name('fertilizer.plantSelection');

// เส้นทางสำหรับหน้าการเลือกระยะเวลาของพืช
Route::get('/stage-selection', [FertilizerController::class, 'stageSelection'])->name('fertilizer.stages')->middleware('auth');

// เส้นทางการคำนวณสูตรปุ๋ย
Route::get('/fertilizer/calculate', [FertilizerController::class, 'showCalculationForm'])->name('fertilizer.calculate');
Route::post('/fertilizer/recommend', [FertilizerController::class, 'recommend'])->name('fertilizer.recommend');
Route::get('/user/fertilizer/history', [FertilizerController::class, 'history'])->name('user.fertilizer.history');
Route::post('/fertilizer/result', [FertilizerController::class, 'showResult'])->name('fertilizer.result');

Route::get('/user/fertilizer/sensor-history', [FertilizerController::class, 'showSensorHistory'])->name('user.fertilizer.sensor_history');
Route::get('/user/fertilizer/custom-history', [CustomFertilizerController::class, 'customHistory'])->name('fertilizer.customHistory');



// เส้นทางสำหรับการแสดงผลการคำนวณปุ๋ย
Route::get('/fertilizer/result', [FertilizerController::class, 'showResult'])->name('fertilizer.result');
Route::post('/user/orders/product-list', [OrderController::class, 'productList'])->name('user.orders.product_list');


//เส้นทางคำนวณสูตรปุ๋ยด้วยตัวเอง
Route::get('/fertilizer/custom', [CustomFertilizerController::class, 'showForm'])->name('fertilizer.custom.form');
Route::post('/fertilizer/custom/calculate', [CustomFertilizerController::class, 'calculate'])->name('fertilizer.custom.calculate');
Route::post('/fertilizer/custom', [CustomFertilizerController::class, 'showForm'])->name('fertilizer.custom.showForm');

Route::get('/orders/products', [OrderController::class, 'productList'])->name('user.orders.product_list');
// เส้นทางสำหรับการแสดงหน้า product_list.blade.php
Route::get('/user/orders/product-list', [OrderController::class, 'productList'])->name('user.orders.product_list');


//manage_order admin
Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
Route::get('/admin/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::get('/admin/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::put('admin/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
Route::get('/admin/orders/slip/{id}', [OrderController::class, 'showSlip'])->name('admin.orders.showSlip');
Route::get('admin/orders/{order}/address', [OrderController::class, 'showAddress'])->name('admin.orders.showAddress');

//history_order user
Route::middleware('auth')->group(function () {
    Route::get('/user/orders', [UserOrderController::class, 'index'])->name('user.orders.index');
    Route::get('/user/orders/{id}', [UserOrderController::class, 'show'])->name('user.orders.show');
});
Route::get('/user/orders', [OrderController::class, 'index'])->name('user.orders.index');

// เส้นทางสำหรับหน้าคำนวณสูตรปุ๋ย
Route::get('/user/calculation', function () {
    return view('user.calculation_menu');
})->name('calculation.menu');

// เส้นทางสำหรับหน้าสั่งซื้อปุ๋ย
Route::get('/user/purchase', function () {
    return view('user.purchase_menu');
})->name('purchase.menu');
Route::get('/user/products', [ProductController::class, 'userIndex'])->name('user.products.index');


// เส้นทางสำหรับฟังก์ชันคำนวณสูตรปุ๋ยย่อย
Route::get('/user/fertilizer/formula', [FertilizerController::class, 'showFormula'])->name('fertilizer.formula');
Route::get('/user/fertilizer/custom', [CustomFertilizerController::class, 'showForm'])->name('fertilizer.custom.form');
Route::get('/user/fertilizer/history', [FertilizerController::class, 'history'])->name('user.fertilizer.history');
//ลบในหน้า formula
Route::delete('/fertilizer/{id}', [FertilizerController::class, 'destroy'])->name('fertilizer.destroy');

// เส้นทางสำหรับฟังก์ชันสั่งซื้อปุ๋ยย่อย
Route::get('/user/products', [ProductController::class, 'index'])->name('user.products.index');
Route::get('/user/orders', [OrderController::class, 'index'])->name('user.orders.index');
