<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Profiles\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $data = $request->only([
            'name',
            'email',
            'phone',
            'address',
        ]);

       

        if ($request->hasFile('profile_image')) {

           
            if (
                $user->profile_image &&
                file_exists(public_path($user->profile_image))
            ) {
                unlink(public_path($user->profile_image));
            }

            $imageName = time() . '.' .
                $request->profile_image->extension();

            $request->profile_image->move(
                public_path('uploads/profiles'),
                $imageName
            );

            $data['profile_image'] =
                '/uploads/profiles/' . $imageName;
        }

        $user->update($data);

        return redirect()
            ->route('profile.show')
            ->with(
                'success',
                'تم تحديث الملف الشخصي بنجاح'
            );
    }

}
