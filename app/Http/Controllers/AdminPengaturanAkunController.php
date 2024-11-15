<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User; // Pastikan model User diimport

class AdminPengaturanAkunController extends Controller
{
    public function index()
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Mengembalikan tampilan dengan data pengguna
        return view('admin.pages.pengaturan-akun', [
            'active' => 'admin-pengaturan-akun',
            'title' => 'Pengaturan Akun | ',
            'user' => $user // Mengirim data pengguna ke tampilan
        ]);
    }

    // Mengupdate data profil
    public function update(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto profil
        ]);

        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Mengupdate nama dan email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Jika ada file foto profil yang diunggah, simpan
        if ($request->hasFile('profile_picture')) {
            // Menghapus foto profil lama jika ada
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture); // Pastikan Storage digunakan dengan benar
            }

            // Menyimpan foto profil baru
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        // Menyimpan perubahan ke database
        if ($user->save()) {
            return redirect()->route('admin.pages.pengaturan-akun')->with('success', 'Profil berhasil diperbarui.');
        } else {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui profil.']);
        }
    }

    // Mengubah password pengguna
    public function changePassword(Request $request)
    {
        // Validasi input password baru
        $request->validate([
            'new_password' => 'required|string|min:8|confirmed', // Validasi password baru dan konfirmasi
        ]);
    
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();
    
        // Mengupdate password baru
        $user->password = Hash::make($request->input('new_password'));
    
        // Menyimpan perubahan password ke database
        if ($user->save()) {
            return redirect()->route('admin.pages.pengaturan-akun')->with('success', 'Password berhasil diubah.');
        } else {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat mengubah password.']);
        }
    }    
}
