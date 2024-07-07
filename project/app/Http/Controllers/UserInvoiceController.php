<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Invoice;
use PDF;

class UserInvoiceController extends Controller
{
    public function index()
    {
        // Assuming the authenticated user has an ID attribute
        $userId = auth()->id();
        
        
        // Retrieve completed reports for the authenticated user
        $reports = Report::where('customer_id', $userId)->where('status', 'Completed')->get();
        
        return view('userreports', compact('reports'));
    }

    public function show($id)
    {
        $invoice = Invoice::with('items', 'report.customer')->findOrFail($id);
        return view('user-invoice-pdf', compact('invoice'));
    }

    public function download($id)
    {
        $invoice = Invoice::with('items', 'report.customer')->findOrFail($id);
        $pdf = PDF::loadView('user-invoice-pdf', compact('invoice'));
        return $pdf->download('invoice.pdf');
    }

    public function search(Request $request)
    {
        $userId = auth()->id();
        $search = $request->input('search');

        $reports = Report::where('customer_id', $userId)
                        ->where('status', 'Completed')
                        ->where(function ($query) use ($search) {
                            $query->whereHas('device', function ($query) use ($search) {
                                $query->where('brand', 'LIKE', "%$search%")
                                      ->orWhere('model', 'LIKE', "%$search%");
                            })
                            ->orWhere('service_type', 'LIKE', "%$search%")
                            ->orWhere('problem_description', 'LIKE', "%$search%");
                        })
                        ->get();

        return view('userreports-search', compact('reports'))->render();
    }

    
}

