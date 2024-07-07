<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        /* Include your styles here */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .invoice-container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            position: relative;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        h1 {
            font-size: 28px;
            color: #ff9800;
        }

        .details, .total-amount {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 10px;
            background: #f0f0f0;
            border-radius: 5px;
        }

        .details label, .total-amount label {
            font-weight: bold;
            color: #000;
        }

        .company-address {
            text-align: left;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .company-name {
            font-weight: bold;
            color: #ff9800;
            font-size: 1.2em; /* Large font for "Company Name" */
            display: block;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background: #ff9800;
            color: #fff;
        }

        td {
            background: #fff;
        }

        .note {
            font-style: italic;
            color: red;
        }

        .top-right {
            position: absolute;
            top: 20px;
            right: 20px;
            text-align: right;
        }

        .top-right label {
            display: block;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="top-right">
            <label>Invoice No: {{ $invoice->invoice_no }}</label>
            <label>Date: {{ $invoice->created_at->toDateString() }}</label>
        </div>
        <div class="company-address">
            <span class="company-name">Company Name</span>
            <span class="company-name">Danish Shop Trading</span>
            <p>LOT PTD 6919,<br>
            OFF JALAN PEGAWAI,<br>
            KAMPUNG TENANG,<br>
            85300 LABIS, JOHOR</p>
        </div>
        <div class="header">
            <h1>Invoice</h1>
        </div>
        <div class="details">
            <label>Bill to: {{ $invoice->report->customer->address }}</label>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Item No</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->items as $item)
                    <tr>
                        <td>{{ $item->item_no }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total-amount">
            <label>Total Amount: {{ $invoice->total_amount }}</label>
        </div>
        <div class="note">
            <p>You can make the payment once your smartphone is delivered to you via cash, bank transfer, or QR Code.</p>
        </div>
    </div>
</body>
</html>
