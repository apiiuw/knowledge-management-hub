<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Make sure to import the User model
use Hash; // To hash the password

class BuatAkunController extends Controller
{
    // Show the form to create a new account
    public function index()
    {
        return view('auth.buat-akun', [
            'title' => 'Buat Akun | '
        ]);
    }

    // Handle form submission and create the new user
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Create the new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Redirect to the login page or somewhere else with a success message
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan masuk.');
    }
}
