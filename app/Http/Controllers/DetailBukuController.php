<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Google_Client;
use Google_Service_AnalyticsData;
use Google_Service_AnalyticsData_RunReportRequest;
use Illuminate\Http\Request;

class DetailBukuController extends Controller
{
    public function index($id)
    {
        // Fetch the book by ID or return a 404 error if not found
        $book = Book::findOrFail($id);

        // Dapatkan jumlah tampilan total dari Google Analytics
        $pageviews = $this->getGoogleAnalyticsTotalPageViews($book->id);

        // Return the view with book data and pageviews
        return view('pages.detail-buku.index', [
            'active' => 'beranda',
            'title' => $book->title . ' | ',
            'book' => $book,
            'pageviews' => $pageviews // Pastikan variabel ini dikirim ke view
        ]);
    }

    public function show($id)
    {
        // Fetch the book by ID or return a 404 error if not found
        $book = Book::findOrFail($id);

        // Increase the view count in the database (optional, for local tracking)
        $book->view_count += 1;
        $book->save();

        // Fetch pageviews from Google Analytics
        $pageviews = $this->getGoogleAnalyticsTotalPageViews($book->id);

        // Send book data and pageviews to the view
        return view('pages.detail-buku.index', compact('book', 'pageviews'));
    }

    /**
     * Get total page views for a specific book from Google Analytics
     *
     * @param int $bookId
     * @return int
     */
    private function getGoogleAnalyticsTotalPageViews($bookId)
    {
        // Set up Google API client
        $client = new Google_Client();
        $client->setAuthConfig(storage_path('app/google-credentials.json'));
        $client->addScope(Google_Service_AnalyticsData::ANALYTICS_READONLY);
        $client->setAccessType('offline');

        // Create the Analytics API service
        $analytics = new Google_Service_AnalyticsData($client);

        // Query the Analytics API for total page views for the book's detail page
        try {
            // Total page views without filtering by specific path or active pages
            $response = $analytics->properties->runReport('properties/466956093', new Google_Service_AnalyticsData_RunReportRequest([
                'dimensions' => [['name' => 'pagePath']], // You can adjust dimensions if needed
                'metrics' => [['name' => 'screenPageViews']], // Metric for total page views
                'dateRanges' => [['startDate' => '30daysAgo', 'endDate' => 'today']], // Modify date range if needed
                'dimensionFilter' => [
                    'filter' => [
                        'fieldName' => 'pagePath',
                        'stringFilter' => [
                            'value' => '/detail-buku/' . $bookId,
                            'matchType' => 'EXACT' // This ensures only the specific book's page is counted
                        ]
                    ]
                ],
            ]));

            // Process the response to get the page views count
            $pageviews = 0;
            if ($response->getRows()) {
                foreach ($response->getRows() as $row) {
                    $pageviews += (int) $row->getMetricValues()[0]->getValue(); // Sum up the page views
                }
            }

            return $pageviews;

        } catch (\Exception $e) {
            // Log the error for debugging purposes
            \Log::error('Google Analytics API Error: ' . $e->getMessage());
            return 0; // Return 0 if something goes wrong
        }
    }
}
