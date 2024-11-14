<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Mengambil data pengunjung per bulan pada tahun berjalan
        $monthlyVisitors = Visitor::selectRaw('MONTH(visit_date) as month, COUNT(*) as count')
                            ->whereYear('visit_date', Carbon::now()->year) // Mengambil tahun berjalan
                            ->groupBy('month')  // Kelompokkan berdasarkan bulan
                            ->orderBy('month')  // Urutkan berdasarkan bulan
                            ->get()
                            ->pluck('count', 'month') // Ambil data jumlah pengunjung per bulan
                            ->toArray();

        // Untuk memastikan ada data bulan yang tidak memiliki pengunjung
        // Pastikan ada 12 bulan (jika bulan belum tercatat, set 0)
        $visitorData = [];
        for ($month = 1; $month <= 12; $month++) {
            $visitorData[$month] = isset($monthlyVisitors[$month]) ? $monthlyVisitors[$month] : 0;
        }

        // Kirim data ke tampilan dashboard
        return view('admin.pages.dashboard', [
            'active' => 'admin-dashboard',
            'title' => 'Admin Dashboard | ',
            'monthlyVisitors' => $visitorData // Kirim data pengunjung per bulan
        ]);
    }
}
