<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Http\Requests\StoreAppointmentRequest;


class AppointmentController extends Controller
{
   public function create(Doctor $doctor)
{
    $schedules = $doctor->schedules()
        ->where('status', 1)
        ->get();

    $availableTimes = [];

    if ($schedules->isNotEmpty()) {

        $schedule = $schedules->first();

        $availableTimes = $this->generateTimeSlots(
            $schedule->from,
            $schedule->to
        );

        $bookedTimes = Appointment::where('doctor_id', $doctor->id)
            ->where('day', $schedule->day)
            ->pluck('appointment_time')
            ->toArray();

        $availableTimes = array_values(
            array_diff($availableTimes, $bookedTimes)
        );
    }

    return view('appointments.create', compact(
        'doctor',
        'schedules',
        'availableTimes'
    ));
}


    public function store(StoreAppointmentRequest $request)
{
    $appointment = Appointment::create([
        'doctor_id'        => $request->doctor_id,
        'day' =>        $request->day,
        // 'appointment_date' => $request->day,
        'patient_name'     => $request->patient_name,
        'patient_phone'    => $request->patient_phone,
        'appointment_time' => $request->appointment_time,
        'notes'            => $request->notes,
        'user_id'          => Auth::id(),
    ]);

    auth()->user()->notify(
        new \App\Notifications\AppointmentBooked($appointment)
    );

    return redirect()
        ->route('appointments.create', $request->doctor_id)
        ->with('success', 'تم حجز الموعد بنجاح');
}

    private function generateTimeSlots($from, $to, $minutes = 30)
{
    $times = [];

     $start = Carbon::createFromTimeString($from);
     $end   = Carbon::createFromTimeString($to);

    while ($start < $end) {
        $times[] = $start->format('H:i');
        $start->addMinutes($minutes);
    }

    return $times;
}

public function edit($id){
    $appointment = Appointment::findOrFail($id);

    if ($appointment->user_id !== auth()->id()){

        abort(403);
    };

    $schedules = Schedule::where('doctor_id', $appointment->doctor_id)
        //  ->where('day', $appointment->day)
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

    return redirect()->route('profile.show')
        ->with('success', 'تم تعديل الحجز بنجاح');
}

public function destroy(Appointment $appointment)
{
    if ($appointment->user_id !== auth()->id()) {
        abort(403);
    }

    $appointment->delete();

    return redirect()->route('profile.show')
        ->with('success', 'تم حذف الحجز بنجاح');
}


}
