<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function showloginform(){
        return view('auth.login');
    }
    public function login(LoginRequest $request)
{
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
    public function register(RegisterRequest $request){
        
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
