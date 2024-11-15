<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Define admin emails
    private $adminEmails = [
        'rafirizqallahandilla@gmail.com',
        'anotheradmin@example.com' // Replace with the second admin email
    ];

    // Method to redirect user to Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle callback from Google
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Check if the user's email is one of the admins
        $isAdmin = in_array($user->getEmail(), $this->adminEmails);

        // Retrieve or create user in database
        $authUser = User::firstOrCreate(
            ['email' => $user->getEmail()],
            [
                'name' => $user->getName(),
                'password' => Hash::make(uniqid()), // Random password
                'profile_picture' => $user->getAvatar(), // Save profile picture URL
                'is_admin' => $isAdmin
            ]
        );

        Auth::login($authUser);

        // Redirect based on role
        if ($isAdmin) {
            return redirect()->route('admin.pages.dashboard');
        } else {
            return redirect()->route('beranda');
        }
    }

    // Logout method
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/masuk'); // Redirect to login page after logout
    }
}
