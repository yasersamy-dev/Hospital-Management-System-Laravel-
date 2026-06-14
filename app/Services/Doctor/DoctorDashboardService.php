<?php

namespace App\Services\Doctor;
use App\Models\Appointment;
use App\Models\Doctor;

class DoctorDashboardService
{
    public function dashboardData(Doctor $doctor){

        $user = $doctor->user;


        $pendingAppointments = $doctor->appointments()
            ->where('status', Appointment::PENDING)
            ->count();
        
        $confirmedAppointments = $doctor->appointments()
            ->where('status', Appointment::CONFIRMED)
            ->count();
        
        $completedAppointments = $doctor->appointments()
            ->where('status', Appointment::COMPLETED)
            ->count();
        
        $cancelledAppointments = $doctor->appointments()
            ->where('status', Appointment::CANCELLED)
            ->count();

        $appointments = $doctor->appointments()
            ->with('user')
            ->latest()
            ->paginate(10);
        return compact(
            'user',
            'appointments',
            'completedAppointments',
            'pendingAppointments',
            'confirmedAppointments',
            'cancelledAppointments');
    }
}
