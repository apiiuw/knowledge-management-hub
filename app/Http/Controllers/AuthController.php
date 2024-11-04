<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Method untuk mengarahkan pengguna ke Google untuk login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Method untuk menangani callback dari Google
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
    
        // Cek apakah email pengguna adalah yang diizinkan
        if ($user->getEmail() === 'rafirizqallahandilla@gmail.com') {
            \Log::info('User Avatar URL: ' . $user->getAvatar()); // Log URL avatar untuk verifikasi
    
            $authUser = User::firstOrCreate(
                ['email' => $user->getEmail()],
                [
                    'name' => $user->getName(),
                    'password' => Hash::make(uniqid()),
                    'profile_picture' => $user->getAvatar(), // Menyimpan URL foto profil
                ]
            );
    
            Auth::login($authUser);
    
            return redirect()->route('admin.pages.dashboard');
        } else {
            return redirect()->route('masuk')->with('error', 'Akses ditolak. Hanya admin yang dapat masuk.');
        }
    }          
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/masuk'); // Redirect ke halaman masuk setelah logout
    }
}
