<?php

namespace App\Http\Controllers;

use App\Models\ForumDiscussion;
use Illuminate\Http\Request;

class ForumDiskusiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        // Debug untuk melihat input search
        // dd($search);
    
        $discussions = ForumDiscussion::where('status', 'Terjawab')
            ->when($search, function ($query, $search) {
                return $query->where('question', 'like', '%' . $search . '%');
            })
            ->get();
    
        return view('pages.forum-diskusi.index', [
            'active' => 'forum-diskusi',
            'title' => 'Forum Diskusi | ',
            'discussions' => $discussions,
        ]);
    }

    public function add()
    {
        return view('pages.forum-diskusi.tanya-admin.index', [
            'active' => 'forum-diskusi',
            'title' => 'Tanya Admin | '
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'question' => 'required|string|max:255',
        ]);

        // Simpan pertanyaan ke database
        ForumDiscussion::create([
            'question' => $request->question,
            'status' => 'Belum Terjawab',
            'date' => now(), // Menggunakan waktu sekarang
        ]);

        // Redirect ke halaman forum diskusi setelah berhasil
        return redirect()->route('forum-diskusi')->with('success', 'Pertanyaan berhasil dikirim!');
    }    
}
