<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(){
        $user = Auth::user();
        $appointments = Appointment::with('doctor')
        ->latest()
        ->where('user_id', $user->id)
        ->get();
        
        return view('profile.show', compact('appointments'));
    }
    public function edit(){
        return view('profile.edit');
    }
    public function update(Request $request){
        $user= Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email,'. $user->id,
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        

            if ($request->hasFile('profile_image')) {
            // حذف القديمة إن وجدت
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                unlink(public_path($user->profile_image));
            }

            // رفع الجديدة داخل public/specialties
            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('specialties'), $imageName);
            $user->profile_image = '/specialties/' . $imageName;
        }

        $user->save();

         return redirect()->route('profile.show')->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }

    public function delete($id){
        $user = Appointment::findOrFail($id);
        $user->delete();
        return redirect()->route('profile.show')->with('success','تم حذف الحجز بنجاح');
    }

}
