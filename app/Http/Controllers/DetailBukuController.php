<?php

namespace App\Http\Controllers;

use App\Models\Book; // Import the Book model
use Illuminate\Http\Request;

class DetailBukuController extends Controller
{
    public function index($id) // Assuming you're passing the book ID as a parameter
    {
        // Fetch the book by ID or return a 404 error if not found
        $book = Book::findOrFail($id);

        // Return the view with book data
        return view('pages.detail-buku.index', [
            'active' => 'beranda',
            'title' => $book->title . ' | ',
            'book' => $book // Pass the book data to the view
        ]);
    }
}
