<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class InvoiceController extends Controller
{
    // Method to display completed reports
    public function showCompletedReports()
    {
        $reports = Report::with(['customer', 'device'])->where('status', 'Completed')->get();
        return view('geninvoice', compact('reports'));
    }

    // Method to generate a receipt
    public function generateReceipt(Request $request)
    {
        $report = Report::with(['customer', 'device'])->findOrFail($request->report_id);
        
        // Create a new Invoice
        $invoice = Invoice::create([
            'report_id' => $report->id,
            'invoice_no' => uniqid('INV-'),
            'total_amount' => 0, // Initial total amount
        ]);

        return view('invoice', compact('report', 'invoice'));
    }

    // Method to save the invoice
    public function saveInvoice(Request $request, $id)
    {

        $invoice = Invoice::findOrFail($id);

        // Delete existing items for the invoice
        InvoiceItem::where('invoice_id', $invoice->id)->delete();

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
        }

        $invoice->total_amount = $totalAmount;
        $invoice->save();

        return redirect()->route('view-invoice', $invoice->id)->with('success', 'Invoice saved successfully.');
    }

    // Method to view the receipt
    public function viewReceipt($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        $report = Report::with('customer')->findOrFail($invoice->report_id);

        return view('view-invoice', compact('invoice', 'report'));
    }
}
