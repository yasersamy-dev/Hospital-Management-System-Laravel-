<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;


class UserAppointmentController extends Controller
{
     public function show(){
        $user = Auth::user();
        $appointments = Appointment::with('doctor')
        ->latest()
        ->where('user_id', $user->id)
        ->get();
        
        return view('appointments.show', compact('appointments'));
    }

    public function edit($id){
    $appointment = Appointment::findOrFail($id);

    if ($appointment->user_id !== auth()->id()){

        abort(403);
    };

    $schedules = Schedule::where('doctor_id', $appointment->doctor_id)
         ->where('status', 1)
         ->get();

     return view('appointments.update', compact('appointment', 'schedules'));
    }

    public function update(Request $request, $id){
    $appointment = Appointment::findOrFail($id);

    if ($appointment->user_id !== auth()->id()){
        abort(403);
    }

    $request->validate([
        'day' => 'required|string',
        'appointment_time' => 'required|string',
    ]);

    $appointment->update([
        'day' => $request->day,
        'appointment_time' => $request->appointment_time,
    ]);

    return redirect()->route('appointments.show')
        ->with('success', 'تم تعديل الحجز بنجاح');
}


public function destroy(Appointment $appointment)
{
    if ($appointment->user_id !== auth()->id()) {
        abort(403);
    }

    $appointment->delete();

    return redirect()->route('appointments.show')
        ->with('success', 'تم حذف الحجز بنجاح');
}
}
