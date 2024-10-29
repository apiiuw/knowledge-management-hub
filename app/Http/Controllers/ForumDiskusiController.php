<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumDiskusiController extends Controller
{
    public function index()
    {
        return view('pages.forum-diskusi.index', [
            'active' => 'forum-diskusi',
            'title' => 'Forum Diskusi | '
        ]);
    }
}