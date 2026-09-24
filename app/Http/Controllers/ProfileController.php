<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('users.edit-profile', ['user' => $user]);
    }

    public function update(EditProfileRequest $request)
    {
        $user = Auth::user();

        $user->update($request->validated());

        return redirect('/profile')->with('message', 'profile updated successfully');
    }
}
