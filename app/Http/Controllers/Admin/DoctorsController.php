<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialty;
use App\Http\Requests\Admin\createDoctorRequest;
use App\Http\Requests\Admin\UpdateDoctorRequest;

class DoctorsController extends Controller
{
    public function index(){
        $doctors = Doctor::with('specialty')->latest()->paginate(10);
        $totalDoctors = Doctor::count();
        $totalSpecialties = Specialty::count();

        return view('admin.view.doctors', compact('doctors', 'totalDoctors', 'totalSpecialties'));
        
    }
       public function create(){
        $specialties = Specialty::all();
        return view('admin.create.createdoctor',compact('specialties'));
    }
    public function store(CreateDoctorRequest $request){
        Doctor::create([
           'name' => $request->name,
           'phone' => $request->phone,
           'specialty_id' => $request->specialty_id,
          ]);
        return redirect()->route('doctors.index')->with('success','تم اضافة الدكتور بنجاح');
    }

    public function edit($id){
        $doctor = Doctor::findOrFail($id);
        $specialties = Specialty::all();
        return view('admin.update.editdoctor', compact('doctor','specialties'));
    }
    public function update(UpdateDoctorRequest $request, $id){
        $doctor = Doctor::findOrFail($id);
        $doctor->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'specialty_id' => $request->specialty_id,
            // 'image' => $$imagepath ?? null,
        ]);

        return redirect()->route('doctors.index')->with('success', ' تم تعديل الدكتور بنجاح');
    }

    public function destroy($id){
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success',' تم حذف الكتور بنجاح');
    }

}
