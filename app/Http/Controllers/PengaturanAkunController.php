<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PengaturanAkunController extends Controller
{
    // Menampilkan halaman pengaturan akun
    public function index()
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        return view('pages.pengaturan-akun.index', [
            'active' => 'pengaturan-akun',
            'title' => 'Pengaturan Akun | ',
            'user' => $user
        ]);
    }

    // Menangani pembaruan profil
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Memperbarui nama
        $user->name = $request->name;

        // Memperbarui foto profil jika ada
        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Menyimpan perubahan
        $user->save();

        return redirect()->route('pengaturan-akun')->with('success', 'Profil berhasil diperbarui!');
    }

    // Menangani pembaruan password
    public function changePassword(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        // Memperbarui password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('pengaturan-akun')->with('success', 'Password berhasil diperbarui!');
    }
}
