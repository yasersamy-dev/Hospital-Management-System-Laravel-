<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        // dd($provider);
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $db_user = User::where('email', $user->getEmail())->first();

        if($db_user){
            Auth::login($db_user);
            return redirect()->route('home.index');
        }
        $new_user = User::create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => bcrypt(Str::random(16)),
        ]);

        Auth::login($new_user);
        return redirect()->route('home.index');
    }
}
