<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class DoctorAppointmentController extends Controller
{
    public function index(Request $request)
    {
        $doctor = auth()->user()->doctor;

        $status = $request->status;

        $appointments = $doctor->appointments()
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate(10);

        return view(
            'doctor_dashboard.appointments.index',
            compact('appointments', 'status')
        );
    }

    public function update(Request $request, Appointment $appointment)
    {
        if ($appointment->doctor_id != auth()->user()->doctor->id) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        $appointment->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'تم تحديث حالة الحجز');
    }
}
