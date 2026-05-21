<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Doctor;
use App\Models\Appointment;
class HomeController extends Controller
{
    public function index(){
        
    
    $specialties = Specialty::select('id', 'name')->get();
    $topdoctors = Doctor::with('specialty')->where('is_featured',true)
    ->latest()
    ->take(6)
    ->get();
                
       // number of doctors ,specialties , bookings 
       
         $doctorCount = Doctor::count();
         $specialtyCount = Specialty::count();
         $patientCount = Appointment::count();
         
         
          return view('home.index', compact(
            'specialties',
            'topdoctors' ,
            'doctorCount',
            'specialtyCount',
            'patientCount'
            ));
    }
}
