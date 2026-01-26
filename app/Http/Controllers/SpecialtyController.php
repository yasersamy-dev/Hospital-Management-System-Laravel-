<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialty;


class SpecialtyController extends Controller
{
    public function show($id){
        // Fetch the specialty by its ID along with its associated doctors
        $specialty = Specialty::with('doctors')->findOrFail($id);
             // 
            $specialty->loadCount('appointments');


        // Return the specialty details to a view (assuming a view named 'specialties.show' exists)

        return view('specialties.show' , compact('specialty'));
    }
}
