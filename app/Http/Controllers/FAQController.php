<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        return view('pages.faq.index', [
            'active' => 'faq',
            'title' => 'FAQ | '
        ]);
    }
}