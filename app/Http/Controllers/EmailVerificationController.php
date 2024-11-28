<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verifyEmail(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $emailDomain = substr(strrchr($email, "@"), 1);

        // Periksa apakah email memiliki domain jasaraharja.co.id
        if ($emailDomain !== 'jasaraharja.co.id') {
            return response()->json(['valid' => false, 'message' => 'Email harus menggunakan domain jasaraharja.co.id.']);
        }

        // Simulasi verifikasi akun Google (ubah dengan implementasi API Google jika diperlukan)
        $isGoogleAccount = $this->isGoogleAccount($email);

        if (!$isGoogleAccount) {
            return response()->json(['valid' => false, 'message' => 'Email tidak valid atau bukan akun Google.']);
        }

        return response()->json(['valid' => true, 'message' => 'Email valid.']);
    }

    // Simulasi pengecekan akun Google
    private function isGoogleAccount($email)
    {
        // Implementasikan Google API untuk memeriksa akun di sini
        // Saat ini hanya simulasi
        return true; // Anggap semua email valid
    }
}
