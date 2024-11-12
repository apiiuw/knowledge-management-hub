<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumDiscussion;
use Illuminate\Support\Facades\Log;

class AdminForumDiskusiController extends Controller
{
    public function index()
    {
        $discussions = ForumDiscussion::all();

        $unansweredCount = $discussions->where('status', 'Belum Terjawab')->count();

        $discussions = $discussions->sortBy(function ($discussion) {
            return $discussion->status === 'Belum Terjawab' ? 0 : 1;
        });

        return view('admin.pages.forum-diskusi', [
            'active' => 'admin-forum-diskusi',
            'title' => 'Admin Forum Diskusi | ',
            'discussions' => $discussions,
            'unansweredCount' => $unansweredCount,
        ]);
    }

    // Controller untuk update jawaban dan status
    public function updateJawabanDanStatus(Request $request, $id)
    {
        // Validasi input jawaban
        $request->validate([
            'answer' => 'required|string',
        ]);
    
        // Temukan diskusi berdasarkan ID
        $discussion = ForumDiscussion::findOrFail($id);
    
        // Update status dan jawaban
        $discussion->status = 'Terjawab';
        $discussion->answer = $request->input('answer');
        $discussion->answered_at = now(); // Jika Anda memiliki kolom waktu jawaban
        $discussion->save();
    
        return redirect()->back()->with('success', 'Jawaban berhasil disimpan dan status diubah menjadi Terjawab');
    }        
    
    public function updateAnswer(Request $request, $id)
    {
        // Validasi input jawaban
        $request->validate([
            'jawaban' => 'required|string',
        ]);
    
        // Ambil diskusi berdasarkan ID
        $discussion = ForumDiscussion::findOrFail($id);
    
        // Perbarui jawaban dan status
        $discussion->jawaban = $request->jawaban;
        $discussion->status = 'Terjawab'; // Atur status menjadi 'Terjawab' setelah ada jawaban
        $discussion->save();
    
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $discussion = ForumDiscussion::find($id);
        if ($discussion) {
            $discussion->delete();
            return redirect()->route('admin.pages.forum-diskusi')->with('success', 'Pertanyaan berhasil dihapus.');
        }
        return redirect()->route('admin.pages.forum-diskusi')->with('error', 'Pertanyaan tidak ditemukan.');
    }
    
}
