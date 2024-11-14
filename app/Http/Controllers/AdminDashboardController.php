<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Data pengunjung per bulan
        $monthlyVisitors = Visitor::selectRaw('MONTH(visit_date) as month, COUNT(*) as count')
                            ->whereYear('visit_date', Carbon::now()->year)
                            ->groupBy('month')
                            ->orderBy('month')
                            ->pluck('count', 'month')
                            ->toArray();
    
        $visitorData = [];
        for ($month = 1; $month <= 12; $month++) {
            $visitorData[$month] = $monthlyVisitors[$month] ?? 0;
        }
    
        // Data pengunjung per buku
        $bookVisitors = Visitor::join('books', 'visitors.book_id', '=', 'books.id')
                            ->selectRaw('books.title as book_title, COUNT(visitors.id) as visitor_count')
                            ->groupBy('books.title')
                            ->orderByDesc('visitor_count')
                            ->get();
    
        return view('admin.pages.dashboard', [
            'active' => 'admin-dashboard',
            'title' => 'Admin Dashboard | ',
            'monthlyVisitors' => array_values($visitorData),
            'monthlyLabels' => array_map(fn($month) => 'Bulan ' . $month, array_keys($visitorData)),
            'bookVisitors' => $bookVisitors,
        ]);
    }
}
