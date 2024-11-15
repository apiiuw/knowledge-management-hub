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
        // Validate form inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Check credentials
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);

            // Check if the user has one of the admin emails
            $adminEmails = ['rafirizqallahandilla@gmail.com', 'example@gmail.com'];

            if (in_array($request->email, $adminEmails)) {
                // Redirect to the admin dashboard if email is in the list
                return redirect()->route('admin.pages.dashboard');
            } elseif ($user->is_admin) {
                // Otherwise, check if the user is an admin and redirect accordingly
                return redirect()->route('admin.pages.dashboard');
            } else {
                // Redirect to the user homepage if not an admin
                return redirect()->route('beranda');
            }
        }

        // If credentials don't match, return error message
        return back()->with('error', 'Invalid credentials. Please try again.');
    }
}
