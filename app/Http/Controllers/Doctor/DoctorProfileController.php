<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Http\Requests\DashboardDoctor\UpdateProfileRequest;
use App\Services\Doctor\DoctorProfileService;

class DoctorProfileController extends Controller
{
     public function __construct(private DoctorProfileService $profileService)
    {
        
    }
    public function index()
    {
        $doctor = auth()->user()->doctor;
        $data = $this->profileService->index($doctor);
        return view('doctor_dashboard.Profile.show', $data);
    }

    public function edit()
    {
        $doctor = auth()->user()->doctor;
        return view('doctor_dashboard.Profile.edit', compact('doctor'));
    }

       public function update(UpdateProfileRequest $request)
    {
        $doctor = auth()->user()->doctor;
        $user   = auth()->user();

        $this->profileService->update($user,$doctor,$request->validated());


        return redirect()
            ->route('doctor.profile')
            ->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }
}
