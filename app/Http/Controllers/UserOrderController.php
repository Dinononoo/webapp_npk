<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;

class UserOrderController extends Controller
{
    
   // Example from a controller method
   public function index()
   {
       $orders = Order::where('user_id', auth()->id())->paginate(10); // Adjust the number 10 as needed
       return view('user.orders.index', compact('orders'));
   }
   
   
   
   public function show($id)
{
    $order = Order::with(['products' => function($query) {
        $query->paginate(5); // Adjust the pagination limit as necessary
    }])->findOrFail($id);

    return view('user.orders.show_index', compact('order'));
}

   
   

public function __construct()
{
    Date::setLocale('th');
}

}
