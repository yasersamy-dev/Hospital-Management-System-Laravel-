<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Doctor;

class SpecialtiesController extends Controller
{
    public function index(){
        $specialties = Specialty::latest()->paginate(10);
        $totalSpecialties = Specialty::count();

       $totalDoctors = Doctor::count();

        return view('admin.view.specialties', compact('specialties', 'totalSpecialties', 'totalDoctors'));
    }
    //create specialty
    public function create(){

        return view('admin.create.createspcialties');
    }
    //store specialty

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:specialties,name',
        ]);

        Specialty::create([
            'name' => $request->name,
        ]);
        return redirect()->route('specialties.index')->with('success', ' تم اضافة التخصص بنجاح ');
    }
    
    public function edit($id){
        $specialty = Specialty::findOrFail($id);
        return view('admin.update.editspecialties', compact('specialty'));
    }

    public function update(Request $request, $id){
        $specialty = Specialty::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:specialties,name,' . $specialty->id,
        ]);

        $specialty->update([
            'name' => $request->name,
        ]);
      

        return redirect()->route('specialties.index')->with('success', ' تم تعديل التخصص بنجاح ');
    }

    public function destroy($id){
        $specialty = Specialty::findOrFail($id);
        $specialty->delete();
        return redirect()->route('specialties.index')->with('success',' تم حذف التخصص بنجاح');
    }

}
