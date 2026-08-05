<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PatientsController extends Controller
{
   public function index()
{
    $doctorId = auth()->user()->doctor->id;

    $patients = User::where('role', 'user')
        ->whereHas('appointments', function ($query) use ($doctorId) {
            $query->where('doctor_id', $doctorId);
        })
        ->withCount([
            'appointments' => function ($query) use ($doctorId) {
                $query->where('doctor_id', $doctorId);
            }
        ])
        ->latest()
        ->paginate(10);

    return view('doctor_dashboard.Patients.index', compact('patients'));
}

   public function show($id)
{
    $doctorId = auth()->user()->doctor->id;

    $patient = User::where('role', 'user')
        ->where('id', $id)
        ->whereHas('appointments', function ($q) use ($doctorId) {
            $q->where('doctor_id', $doctorId);
        })
        ->with([
            'appointments' => function ($q) use ($doctorId) {
                $q->where('doctor_id', $doctorId)
                  ->latest();
            }
        ])
        ->firstOrFail();

    return view('doctor_dashboard.Patients.show', compact('patient'));
}
}
