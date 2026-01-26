<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showloginform(){
        return view('auth.login');
    }
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        if (auth()->user()->role === 'admin') {
      return redirect()->route('admin.dashboard');
   }
        if (auth()->user()->role === 'doctor') {
      return redirect()->route('doctor.dashboard');
   }
 
        return redirect()->route('home.index');
    }

    return back()->withErrors([
        'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
    ]);
}


    public function showregisterform(){
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users,email',
            'password' =>'required|string|min:8|confirmed',
        ]);     

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success', 'تم إنشاء الحساب بنجاح، يمكنك تسجيل الدخول الآن');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'تم تسجيل الخروج بنجاح');
    }
}
