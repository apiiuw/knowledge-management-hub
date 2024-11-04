<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminForumDiskusiController extends Controller
{
    public function index()
    {
        return view('admin.pages.forum-diskusi', [
            'active' => 'admin-forum-diskusi',
            'title' => 'Admin Forum Diskusi | '
        ]);
    }
}
