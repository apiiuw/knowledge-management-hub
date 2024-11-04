<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBukuController extends Controller
{
    public function index()
    {
        return view('admin.pages.buku', [
            'active' => 'admin-buku',
            'title' => 'Admin Buku | '
        ]);
    }
}
