<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        // Logika untuk menampilkan halaman edit profil
        return view('editprofil');
    }
}
