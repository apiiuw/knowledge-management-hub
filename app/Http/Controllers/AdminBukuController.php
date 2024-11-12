<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBukuController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query pencarian dan kategori dari request
        $query = $request->input('query');
        $category = $request->input('category');

        // Buat query dasar untuk mengambil data buku
        $books = Book::query();

        // Filter berdasarkan kategori jika ada
        if ($category) {
            $books->where('type', $category);
        }

        // Filter berdasarkan query pencarian jika ada
        if ($query) {
            $books->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
        }

        // Ambil semua buku yang sudah difilter
        $books = $books->get();

        return view('admin.pages.buku', [
            'active' => 'admin-buku',
            'title' => 'Admin Buku | ',
            'books' => $books,
            'query' => $query, // Kirim query pencarian ke view
            'category' => $category, // Kirim kategori ke view
        ]);
    }

    public function create()
    {
        return view('admin.pages.buku-tambah', [
            'active' => 'admin-buku',
            'title' => 'Tambah Buku | '
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'description' => 'required|string',
            'keywords' => 'required|string|min:3',
            'book_file' => 'required|mimes:pdf|max:2048',
        ]);
    
        // Format path untuk `cover_image` dan `download_link`
        $coverImage = 'path/to/cover_image.jpg';
        $downloadLink = 'path/to/download.pdf';
    
        // Format untuk lokasi penyimpanan file PDF
        $pdfFile = $request->file('book_file');
        $pdfFileName = $pdfFile->getClientOriginalName();
        $fileType = strtolower(str_replace(' ', '-', $request->type));
        $pdfFilePath = 'assets/' . $fileType . '/' . $pdfFileName;
        $pdfFile->move(public_path('assets/' . $fileType), $pdfFileName);
    
        // Menyimpan data ke database
        Book::create([
            'title' => $request->title,
            'type' => $request->type,
            'cover_image' => $coverImage,
            'release_year' => $request->release_year,
            'description' => $request->description,
            'keywords' => $request->keywords, // Simpan langsung sebagai string
            'download_link' => $downloadLink,
            'pdf_file' => $pdfFilePath,
        ]);
    
        return redirect()->route('admin.pages.buku')->with('success', 'Buku berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.pages.edit-buku', [
            'active' => 'admin-buku',
            'title' => 'Edit Buku | ',
            'book' => $book,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'description' => 'required|string',
            'keywords' => 'nullable|string',
            'book_file' => 'nullable|file|mimes:pdf|max:2048', // optional file validation
        ]);

        // Find the book by ID
        $book = Book::findOrFail($id);

        // Update book details
        $book->title = $request->input('title');
        $book->type = $request->input('type');
        $book->release_year = $request->input('release_year');
        $book->description = $request->input('description');
        $book->keywords = $request->input('keywords');

        // Handle file upload if a new file is uploaded
        if ($request->hasFile('book_file')) {
            $file = $request->file('book_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/books', $fileName); // store file in 'public/books' directory
            $book->pdf_file = $fileName;
        }

        // Save the changes
        $book->save();

        // Redirect back with a success message
        return redirect()->route('admin.pages.buku')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Temukan buku berdasarkan ID dan hapus
        $book = Book::findOrFail($id);
        $book->delete();

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('admin.pages.buku')->with('success', 'Buku berhasil dihapus.');
    }
}
