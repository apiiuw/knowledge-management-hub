<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanAkunController extends Controller
{
    public function index()
    {
        return view('admin.pages.pengaturan-akun', [
            'active' => 'admin-pengaturan-akun',
            'title' => 'Pengaturan Akun | '
        ]);
    }
}
