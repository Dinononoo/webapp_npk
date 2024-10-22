

<!-- namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sensor;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลที่ต้องการ
        $totalUsers = User::count();
        $totalSensors = Sensor::count();
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $pendingTasks = $this->calculatePendingTasks(); // หรือใช้คำสั่งนับงานที่ค้างอยู่จริง

        // ส่งข้อมูลไปยัง view
        return view('admin.dashboard', compact('totalUsers', 'totalSensors', 'totalOrders', 'totalProducts', 'pendingTasks'));
    }

    private function calculatePendingTasks()
    {
        // โค้ดสำหรับคำนวณงานที่ค้างอยู่
        return 50; // สมมุติว่ามีงานค้างอยู่ 50%
    }
} -->
