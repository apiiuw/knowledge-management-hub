<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KompetensiController extends Controller
{
    public function index()
    {
        // Grouping books by the 'softskill' attribute
        $books = Book::all()->groupBy('softskill');
    
        return view('pages.kompetensi.index', [
            'active' => 'kompetensi',
            'title' => 'Kompetensi | ',
            'books' => $books,
        ]);
    }
    
}
