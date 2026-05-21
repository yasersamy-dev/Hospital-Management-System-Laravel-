<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialty;


class DoctorController extends Controller
{
    public function showdoctors($id)
   {
    
   $doctor = Doctor::with('specialty')->findOrFail($id);

    return view('doctors.doctor', compact('doctor'));
 }

}
