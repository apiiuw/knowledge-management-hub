<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        return view('pages.tentang-kami.index', [
            'active' => 'tentang-kami',
            'title' => 'Tentang Kami | '
        ]);
    }
}