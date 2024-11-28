<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MasukController extends Controller
{
    public function index()
    {
        return view('auth.masuk', [
            'title' => 'Masuk Akun | '
        ]);
    }

    public function login(Request $request)
    {
        // Validasi input form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // List admin emails yang diperbolehkan
        $adminEmails = [
            'rafirizqallahandilla@gmail.com',
            'urayfaisal@gmail.com',
            'urayfaisal.hafiz@jasaraharja.co.id'
        ];
    
        // Ambil domain dari email
        $emailDomain = substr(strrchr($request->email, "@"), 1);
    
        // Periksa apakah email admin atau domain @jasaraharja.co.id
        if (!in_array($request->email, $adminEmails) && $emailDomain !== 'jasaraharja.co.id') {
            return back()->with('error', 'Hanya email dengan domain @jasaraharja.co.id yang diperbolehkan masuk.');
        }
    
        // Periksa kredensial
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            // Login user
            Auth::login($user);
    
            // Redirect sesuai role atau email admin
            if (in_array($user->email, $adminEmails) || $user->is_admin) {
                return redirect()->route('admin-dashboard');
            } else {
                return redirect()->route('beranda');
            }
        }
    
        // Jika kredensial tidak cocok
        return back()->with('error', 'Email atau password salah.');
    }    
}
