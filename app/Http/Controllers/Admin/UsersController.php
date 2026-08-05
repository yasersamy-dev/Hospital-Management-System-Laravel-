<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;

class UsersController extends Controller
{
   public function index(){
    $users= User::latest()->paginate(10);
    $totalUsers = User::count();
    $totalAdmins = User::where('role','admin')->count();
    $totalDoctors = User::where('role','doctor')->count();
    $totalPatients = User::where('role','user')->count();
    return view('admin.view.users' , compact('users', 'totalUsers', 'totalAdmins', 'totalDoctors', 'totalPatients'));
   } 
   
    public function create(){

        return view('admin.create.createuser');
    }

    public function store(CreateUserRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return  redirect()->route('users.index')->with('success','تم انشاء المستخدم بنجاح');
    }

    public function edit(User $user){
        return view('admin.update.edituser', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user){
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('users.index')->with('success', 'تم تحديث المستخدم بنجاح');
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح');
    }
}
