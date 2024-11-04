<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard', [
            'active' => 'admin-dashboard',
            'title' => 'Admin Dashboard | '
        ]);
    }
}
