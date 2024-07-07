<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use PDF;

class SalesReportController extends Controller
{
    // Method to display the sales report
    public function index()
    {
        // Retrieve sales data grouped by month
        $sales = Invoice::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_amount) as total')
                        ->groupBy('year', 'month')
                        ->orderBy('year', 'asc')
                        ->orderBy('month', 'asc')
                        ->get();

        return view('sales', compact('sales'));
    }

    // Method to download the sales report as PDF
    public function download()
    {
        // Retrieve sales data grouped by month
        $sales = Invoice::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_amount) as total')
                        ->groupBy('year', 'month')
                        ->orderBy('year', 'asc')
                        ->orderBy('month', 'asc')
                        ->get();

        // Load the view and pass sales data to it
        $pdf = PDF::loadView('salespdf', compact('sales'));

        // Download the PDF file
        return $pdf->download('sales_report.pdf');
    }
}
