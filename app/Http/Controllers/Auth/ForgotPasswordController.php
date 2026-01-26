<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function showforgotform(){
        return view('auth.forgot-password');
    }

    public function sendresetlink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
        ]);

        $token=Str::random(64);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email'=>$request->email],
            [
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]
            );
          Mail::raw(
            'اضغط على الرابط لإعادة تعيين كلمة السر: ' .
            url('/reset-password/' . $token . '?email=' . $request->email),
            function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('إعادة تعيين كلمة السر');
            }
        );
          return back()->with('success', 'تم إرسال رابط إعادة تعيين كلمة السر');

    }
}
