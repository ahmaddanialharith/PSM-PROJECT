<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
    // Method to display completed reports
    public function showCompletedReports()
    {
        $reports = Report::with(['invoice', 'customer', 'device'])->where('status', 'Completed')->get();
        //Log::debug('Completed reports retrieved', ['reports' => $reports]);
        return view('geninvoice', compact('reports'));
    }

    // Method to generate a receipt
    public function generateReceipt(Request $request)
    {
        $report = Report::with(['customer', 'device'])->findOrFail($request->report_id);
        //Log::debug('Report retrieved for generating receipt', ['report' => $report]); 

        // Create a new Invoice
        $invoice = Invoice::create([
            'report_id' => $report->id,
            'invoice_no' => uniqid('INV-'),
            'total_amount' => 0, // Initial total amount
        ]);

        //Log::debug('Invoice created', ['invoice' => $invoice]);

        return view('invoice', compact('report', 'invoice'));
    }

    // Method to save the invoice
    public function saveInvoice(Request $request, $id)
    {

        $invoice = Invoice::findOrFail($id);
        //Log::debug('Invoice retrieved for saving', ['invoice' => $invoice]);

        // Delete existing items for the invoice
        InvoiceItem::where('invoice_id', $invoice->id)->delete();
        //Log::debug('Existing invoice items deleted', ['invoice_id' => $invoice->id]);

        $totalAmount = 0;
        foreach ($request->items as $item) {
            
            $amount = (float)$item['price'];
            $totalAmount += $amount;

            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'item_no' => $item['item_no'],
                'description' => $item['description'],
                'price' => $amount,
                'amount' => $amount,
            ]);
            //Log::debug('Invoice item created', ['item' => $item]);
        }

        $invoice->total_amount = $totalAmount;
        $invoice->save();
        //Log::debug('Invoice updated with total amount', ['invoice' => $invoice]);


        return redirect()->route('view-invoice', $invoice->id)->with('success', 'Invoice saved successfully.');
    }

    // Method to view the receipt
    public function viewReceipt($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        //Log::debug('Invoice retrieved for viewing', ['invoice' => $invoice]);
        $report = Report::with('customer')->findOrFail($invoice->report_id);
        //Log::debug('Report retrieved for viewing invoice', ['report' => $report]);

        // Check if the report has an associated invoice
    if (!$report->invoice) {
        // Handle the case where the invoice does not exist

        return redirect()->back()->with('error', 'Invoice not found for this report.');
    }


        return view('view-invoice', compact('invoice', 'report'));
    }

     // Method to handle AJAX search
     public function searchReports(Request $request)
     {
         $search = $request->input('search');
         $reports = Report::where('status', 'Completed')
             ->where(function ($query) use ($search) {
                 $query->whereHas('customer', function ($q) use ($search) {
                     $q->where('full_name', 'LIKE', "%$search%");
                 })->orWhereHas('device', function ($q) use ($search) {
                     $q->where('brand', 'LIKE', "%$search%")->orWhere('model', 'LIKE', "%$search%");
                 })->orWhere('service_type', 'LIKE', "%$search%")
                     ->orWhere('problem_description', 'LIKE', "%$search%");
             })
             ->with(['customer', 'device'])
             ->get();
 
         return view('geninvoicesearch', compact('reports'));
     }
}
