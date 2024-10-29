<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('pages.kontak.index', [
            'active' => 'kontak',
            'title' => 'Kontak | '
        ]);
    }
}