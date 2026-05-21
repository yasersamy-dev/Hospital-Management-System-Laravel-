<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialty;


class SpecialtyController extends Controller
{
    public function show($id){
      
        $specialty = Specialty::with('doctors')->findOrFail($id);
             
            $specialty->loadCount('appointments');

        return view('specialties.show' , compact('specialty'));
    }
}
