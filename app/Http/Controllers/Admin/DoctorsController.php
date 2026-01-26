<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialty;

class DoctorsController extends Controller
{
    public function index(){
        $doctors = Doctor::with('specialty')->latest()->paginate(10);

        return view('admin.view.doctors', compact('doctors'));
        
    }
       public function create(){
        $specialties = Specialty::all();
        return view('admin.create.createdoctor',compact('specialties'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'phone'=>'required|string|max:20',
            'specialty_id'=>'required|exists:specialties,id',
        ]);
       
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
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
             'specialty_id'=>'required|exists:specialties,id',
            'image'=>'nullable|image|max:2048',
        ]);
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
