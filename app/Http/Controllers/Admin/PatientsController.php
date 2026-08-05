<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;

class PatientsController extends Controller
{


    public function index()
    {
        $patients = User::where('role', 'user')
            ->withCount('appointments')
            ->latest()
            ->paginate(10);

        $totalPatients = User::where('role', 'user')->count();

        $totalAppointments = Appointment::count();    

        return view('admin.view.patients', compact('patients', 'totalPatients', 'totalAppointments'));
    }


}
