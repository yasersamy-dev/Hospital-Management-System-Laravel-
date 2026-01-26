<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(){

        return view('admin.profile.view');
    }
    public function update(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:225|unique:users,email,' . auth()->user()->id,
        ]);
        $user = auth()->user();
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        return redirect()->route('admin.profile')->with('success','تم تحديث الملف الشخصي بنجاح');
    }
}
