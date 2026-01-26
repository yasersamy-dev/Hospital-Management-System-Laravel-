<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;

class DoctorDashboardController extends Controller
{
    public function index(){
        $doctor = auth()->user()->doctor ?? abort(403);
        $user = $doctor->user;

$appointments = $doctor->appointments()
    ->with('user')
    ->latest()
    ->paginate(10);

     return view('doctordashbord.index',compact('user', 'appointments'));
    }

    public function update(Request $request, Appointment $appointment)
{
    if ($appointment->doctor_id !== auth()->user()->doctor->id) {
    abort(403);
}

    $request->validate([
        'status' => 'required|in:pending,confirmed,cancelled',
    ]);

    //   if (
    //     $request->status === Appointment::COMPLETED &&
    //     $appointment->status !== Appointment::CONFIRMED
    // ) {
    //     abort(403);
    // }

    $appointment->update([
        'status' => $request->status
    ]);

    return back();
}

}
