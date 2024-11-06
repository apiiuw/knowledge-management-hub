<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

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


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.pages.edit-buku', [
            'active' => 'admin-buku',
            'title' => 'Edit Buku | ',
            'book' => $book,
        ]);
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
