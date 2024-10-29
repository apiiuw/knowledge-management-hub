<?php

namespace App\Http\Controllers;

use App\Models\Book; // Make sure to import the Book model
use App\Models\CarouselItem; // Import the CarouselItem model if you have one
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $books = Book::all(); // Fetch all books from the database

        return view('pages.beranda.index', [
            'active' => 'beranda',
            'title' => 'Beranda', // Set the title as needed
            'books' => $books, // Pass the books to the view
        ]);
    }
}
