<?php

namespace App\Services;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AppointmentService
{
    public function prepareCreateData(Doctor $doctor)
    {
        // Logic to create an appointment

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

   return [
    'doctor' => $doctor,
    'schedules' => $schedules,
    'availableTimes' => $availableTimes,
   ];
    }

    public function storeAppointment(array $data)
    {
        // Logic to store an appointment
     $appointment = Appointment::create([
        'doctor_id'        => $data['doctor_id'],
        'day' =>        $data['day'],
        // 'appointment_date' => $date['day'],
        'patient_name'     => $data['patient_name'],
        'patient_phone'    => $data['patient_phone'],
        'appointment_time' => $data['appointment_time'],
        'notes'            => $data['notes'] ?? null,
        'user_id'          => Auth::id(),
    ]);

    return $appointment;
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
}
