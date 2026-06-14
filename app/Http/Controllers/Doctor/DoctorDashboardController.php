<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Doctor\DoctorDashboardService;

class DoctorDashboardController extends Controller
{
   
    public function __construct(private DoctorDashboardService $dashboardService)

     {
        
     }
     
    public function index(){
        $doctor = auth()->user()->doctor ?? abort(403);
        $data = $this->dashboardService->dashboardData($doctor);
        
        return view('doctor_dashboard.index',$data);
    }

}
