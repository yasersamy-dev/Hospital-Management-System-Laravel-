<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Http\Requests\StoreAppointmentRequest;
use App\Services\AppointmentService;
use App\Notifications\DoctorAppointmentBooked;
use App\Notifications\AppointmentBooked;

class AppointmentController extends Controller
{
    protected AppointmentService $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    
   public function create(Doctor $doctor)
{
    $data= $this->appointmentService->prepareCreateData($doctor);

    return view('appointments.create', $data);
}


    public function store(StoreAppointmentRequest $request)
{
    $appointment = $this->appointmentService->storeAppointment($request->validated());

    auth()->user()->notify(
        new AppointmentBooked($appointment)
    );

    $doctorUser = $appointment->doctor->user;

    $doctorUser->notify(
        new DoctorAppointmentBooked($appointment)
    );

    return redirect()
        ->route('appointments.create', $request->doctor_id)
        ->with('success', 'تم حجز الموعد بنجاح');
}
}
