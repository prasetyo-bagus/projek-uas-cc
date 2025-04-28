<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('settingprofile.profileadmin');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo_path) {
                Storage::delete($user->photo_path);
            }

            // Store new photo
            $path = $request->file('photo')->store('profile-photos', 'public');
            $user->photo_path = $path;
        }

        User::where('id', $user->id)->update([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'photo_path' => $user->photo_path
        ]);

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
} 