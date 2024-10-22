<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

             // เรียกใช้ฟังก์ชัน updateUserId หลังจากเข้าสู่ระบบสำเร็จ
             app(NPKController::class)->updateUserId();
             
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.manage.users');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return redirect()->route('login')->withErrors(['error' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
