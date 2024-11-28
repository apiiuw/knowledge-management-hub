<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $adminEmails = [
        'rafirizqallahandilla@gmail.com',
        'urayfaisal@gmail.com',
        'urayfaisal.hafiz@jasaraharja.co.id',
    ];

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
    
            // Debug log to ensure correct email
            \Log::info('Google user email: ' . $user->getEmail());
    
            // Check if user email is valid (admin or @jasaraharja.co.id)
            $emailDomain = substr(strrchr($user->getEmail(), "@"), 1);
            $isAdmin = in_array($user->getEmail(), $this->adminEmails);
    
            if (!$isAdmin && $emailDomain !== 'jasaraharja.co.id') {
                return redirect()->route('masuk.login')->with('error', 'Hanya email dengan domain @jasaraharja.co.id yang diperbolehkan masuk.');
            }
    
            // Update or create user in database
            $authUser = User::updateOrCreate(
                ['email' => $user->getEmail()],
                [
                    'name' => $user->getName(),
                    'password' => Hash::make(uniqid()), // Random password
                    // Hilangkan pengisian kolom profile_picture
                    'is_admin' => $isAdmin
                ]
            );
    
            // Log user in
            Auth::login($authUser);
    
            // Redirect user based on role
            return $isAdmin
                ? redirect()->route('admin.pages.dashboard')
                : redirect()->route('beranda');
        } catch (\Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect()->route('masuk.login')->with('error', 'Terjadi kesalahan saat masuk, silahkan coba lagi.');
        }
    }    

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/masuk');
    }
}
