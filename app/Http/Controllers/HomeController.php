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
        //fetch specialties id and name only
           $specialties = Specialty::select('id', 'name')->get();

           //fetch features doctors with their specialty
           $topdoctors = Doctor::with('specialty')->where('is_featured',true)
                       ->latest()
                       ->take(6)
                       ->get();
                
            // number of doctors ,specialties , bookings      
         $doctorCount = Doctor::count();
         $specialtyCount = Specialty::count();
         $patientCount = Appointment::count();
         
         //return to home view with date
          return view('home.index', compact(
            'specialties',
            'topdoctors' ,
            'doctorCount',
            'specialtyCount',
            'patientCount'
            ));
    }
}
