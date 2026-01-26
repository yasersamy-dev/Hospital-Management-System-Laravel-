<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
     public function showresetform(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function resetpassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:8|confirmed',
            'token'=>'required'
        ]);

        $reset=DB::table('password_reset_tokens')
        ->where('email',$request->email)
        ->where('token',$request->token)
        ->where('created_at', '>', Carbon::now()->subMinutes(60))
        ->first();

        if(!$reset){
            return back()->withErrors(['email'=>'رابط اعادة كلمة السر غير صالح ']);
        }

        DB::table('users')
        ->where('email',$request->email)
        ->update([
            'password'=>Hash::make($request->password)
        ]);
         DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        return redirect()->route('login')
            ->with('success', 'تم تغيير كلمة السر بنجاح');

    }
}
