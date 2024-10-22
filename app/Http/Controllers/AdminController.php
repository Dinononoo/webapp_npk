<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // public function dashboard()
    // {
    //     return view('admin.dashboard');
    // }

    public function manageUsers()
    {
        $users = User::all();
        return view('admin.manage_users', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manage.users')->with('success', 'User deleted successfully');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.manage.users');
        }
        return redirect()->route('user.dashboard');
    }

    return back()->withErrors(['email' => 'Email or password are incorrect.']);
}



// {
//     // ดึงเส้นทางของ QR Code จากฐานข้อมูลหรือไฟล์ที่บันทึกไว้
//     $qrcodePath = config('app.qrcode_path', 'path/to/default/qrcode.png');

//     return view('admin.orders.upload_qrcode', compact('qrcodePath'));
// }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
