<?php

namespace App\Services\Admin;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Specialty;
use Carbon\Carbon;

class DashboardService
{
    public function getDashboardData(){
    $latestAppointments =  Appointment::with('doctor')->latest()->take(5)->get();
    $appointmentsChartLabels = [];
    $appointmentsChartData   = [];
    for ($i = 6; $i >= 0; $i--) {
    $date = Carbon::today()->subDays($i);

    $appointmentsChartLabels[] = $date->format('d M');

    $appointmentsChartData[] = Appointment::whereDate('created_at', $date)->count();
}
    return [
        'usersCount' => User::count(),
        'doctorsCount' => Doctor::count(),
        'patientsCount' => User::where('role', 'user')->count(),
        'specializationsCount' => Specialty::count(),
       'appointmentsToday' => Appointment::whereDate('created_at', today())->count(),
       'latestAppointments' =>$latestAppointments,
       'appointmentsChartLabels' => $appointmentsChartLabels,
       'appointmentsChartData' => $appointmentsChartData,
    ];

}
}
