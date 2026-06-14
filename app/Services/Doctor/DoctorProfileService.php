<?php

namespace App\Services\Doctor;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;

class DoctorProfileService
{
    public function index(Doctor $doctor){
         $appointments = $doctor->appointments()
            ->with('user')
            ->latest()
            ->paginate(10);

        $completedAppointments = $doctor->appointments()
          ->where('status', Appointment::COMPLETED)
          ->count(); 

        return  compact('doctor', 'appointments', 'completedAppointments');
    }

    public function update(User $user, Doctor $doctor, array $data){
        $doctor = auth()->user()->doctor;
        $user = auth()->user();

        $user->update([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'phone'   => $data['phone'],
            'address' => $data['address'],
        ]);

        $doctorData = [
            'name'  => $data['name'],
            'phone' => $data['phone'],
            'bio'   => $data['bio'],
        ];

        if (isset($data['image'])) {

            if (
                $doctor->image &&
                file_exists(public_path($doctor->image))
            ) {
                unlink(public_path($doctor->image));
            }

            $imageName = time() . '.' . $data['image']->extension();

            $data['image']->move(
                public_path('uploads/profiles'),
                $imageName
            );

            $doctorData['image'] = 'uploads/profiles/' . $imageName;
        }

        $doctor->update($doctorData);

    }
}
