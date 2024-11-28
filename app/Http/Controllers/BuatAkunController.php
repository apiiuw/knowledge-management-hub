<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BuatAkunController extends Controller
{
    // Tampilkan form buat akun
    public function index()
    {
        return view('auth.buat-akun', [
            'title' => 'Buat Akun | '
        ]);
    }

    // Proses pembuatan akun baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&#]/'
            ],
        ], [
            'password.regex' => 'Password harus mengandung minimal satu huruf besar, huruf kecil, angka, dan simbol.',
        ]);

        // Validasi domain email
        $emailDomain = substr(strrchr($request->email, "@"), 1);
        if ($emailDomain !== 'jasaraharja.co.id') {
            return back()->withErrors(['email' => 'Hanya email dengan domain @jasaraharja.co.id yang diperbolehkan.']);
        }

        // Normalisasi input
        $name = trim($request->name);
        $email = trim($request->email);

        // Buat pengguna baru
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($request->password),
            'is_admin' => false, // Default non-admin
        ]);

        // Redirect ke halaman login
        return redirect()->route('masuk.login')->with('success', 'Akun berhasil dibuat! Silakan masuk.');
    }
}
