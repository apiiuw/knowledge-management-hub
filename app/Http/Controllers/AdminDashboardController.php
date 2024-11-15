<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Visitor;
use App\Models\Book;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Tahun yang dipilih atau default ke tahun sekarang
        $selectedYear = $request->get('year', Carbon::now()->year);

        // Simpan tahun yang dipilih dalam session
        session()->flash('selectedYear', $selectedYear);
    
        // Data pengunjung per bulan pada tahun yang dipilih
        $monthlyVisitors = Visitor::selectRaw('MONTH(visit_date) as month, COUNT(*) as count')
            ->whereYear('visit_date', $selectedYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();
    
        $visitorData = [];
        for ($month = 1; $month <= 12; $month++) {
            $visitorData[$month] = $monthlyVisitors[$month] ?? 0;
        }
    
        // Data pengunjung tahunan
        $yearlyVisitors = Visitor::selectRaw('YEAR(visit_date) as year, COUNT(*) as count')
            ->groupBy('year')
            ->orderByDesc('year')
            ->pluck('count', 'year')
            ->toArray();
    
        // Data pengunjung per buku pada tahun yang dipilih
        $bookVisitors = Visitor::join('books', 'visitors.book_id', '=', 'books.id')
            ->selectRaw('books.title as book_title, COUNT(visitors.id) as visitor_count')
            ->whereYear('visit_date', $selectedYear)
            ->groupBy('books.title')
            ->orderByDesc('visitor_count')
            ->get();
    
        // Daftar tahun untuk filter
        $years = range(Carbon::now()->year, Carbon::now()->subYears(5)->year);

        return view('admin.pages.dashboard', [
            'active' => 'admin-dashboard',
            'title' => 'Admin Dashboard | ',
            'monthlyVisitors' => array_values($visitorData),
            'monthlyLabels' => array_map(fn($month) => 'Bulan ' . $month, array_keys($visitorData)),
            'yearlyVisitors' => $yearlyVisitors,
            'years' => $years,
            'selectedYear' => $selectedYear,
            'bookVisitors' => $bookVisitors,
        ]);
    }
}
