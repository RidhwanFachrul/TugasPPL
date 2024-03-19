<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // Metode untuk menampilkan form edit username dan password
    public function edit()
    {
        return view('edit-profile');
    }

    // Metode untuk menyimpan perubahan username dan password
    public function update(Request $request)
    {
        // Mendapatkan pengguna yang terautentikasi
        $user = Auth::user();

        // Memastikan pengguna sudah terautentikasi sebelum melanjutkan
        if (!$user) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update username jika ada perubahan
        if ($request->name) {
            $user->name = $request->name;
        }

        // Update password jika ada perubahan
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
