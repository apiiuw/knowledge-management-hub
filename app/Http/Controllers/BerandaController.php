<?php

namespace App\Http\Controllers;

use App\Models\Book; // Make sure to import the Book model
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        // Get current year
        $currentYear = now()->year;

        // Get distinct release years for each category, limiting to the last 5 years
        $articleYears = Book::where('type', 'Artikel')
            ->where('release_year', '>=', $currentYear - 4) // Adjust to get the last 5 years
            ->distinct()
            ->pluck('release_year');

        $bookYears = Book::where('type', 'Buku Elektronik')
            ->where('release_year', '>=', $currentYear - 4) // Adjust to get the last 5 years
            ->distinct()
            ->pluck('release_year');

        $caseStudyYears = Book::where('type', 'Studi Kasus')
            ->where('release_year', '>=', $currentYear - 4) // Adjust to get the last 5 years
            ->distinct()
            ->pluck('release_year');

        $query = $request->input('query');
        $category = $request->input('category');
        $releaseYear = $request->input('release_year'); // Capture the release year from the request

        // Membangun query untuk mengambil data buku
        $booksQuery = Book::query();
    
        // Filter berdasarkan kategori jika ada
        if ($category) {
            $booksQuery->where('type', $category);
        }

        // Filter berdasarkan tahun jika ada
        if ($releaseYear) {
            $booksQuery->where('release_year', $releaseYear);
        }
    
        // Filter berdasarkan pencarian jika ada
        if ($query) {
            $booksQuery->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', '%' . $query . '%')
                             ->orWhere('description', 'like', '%' . $query . '%');
            });
        }
    
        // Mengambil hasil dengan pagination
        $books = $booksQuery->paginate(6);
    
        return view('pages.beranda.index', [
            'active' => 'beranda',
            'title' => '',
            'books' => $books,
            'query' => $query,
            'category' => $category,
            'release_year' => $releaseYear, // Pass the release year to the view
            'articleYears' => $articleYears, // Pass the years to the view
            'bookYears' => $bookYears,
            'caseStudyYears' => $caseStudyYears,
        ]);
    }    
}
