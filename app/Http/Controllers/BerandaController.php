<?php

namespace App\Http\Controllers;

use App\Models\Book; // Make sure to import the Book model
use App\Models\CarouselItem; // Import the CarouselItem model if you have one
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');
        $releaseYear = $request->input('release_year');
    
        $books = Book::query();
    
        if ($query) {
            $books->where('title', 'like', '%' . $query . '%')
                  ->orWhere('keywords', 'like', '%' . $query . '%')
                  ->orWhere('description', 'like', '%' . $query . '%');
        }
    
        if ($category) {
            $books->where('type', $category);
        }
    
        if ($releaseYear) {
            $books->whereYear('release_year', $releaseYear);
        }
    
        $books = $books->get();
    
        return view('pages.beranda.index', [
            'active' => 'beranda',
            'title' => '', // Set the title as needed
            'books' => $books, 
            'query' => $query,
            'category' => $category,
            'release_year' => $releaseYear,
        ]);
    }    
}
