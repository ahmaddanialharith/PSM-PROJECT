<!DOCTYPE html>
<html>
<head>
    <title>Generate Invoice</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .invoice-container {
            width: 90%;
            max-width: 800px;
            padding: 20px 40px;
            background: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
            color: #ff9800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #000; /* Black */
        }

        .info-label {
            font-weight: normal;
            color: #000; /* Black */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background: #f9f9f9;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f0f0f0;
            color: #000; /* Black */
        }

        button {
            padding: 10px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            color: white;
            font-size: 16px;
            font-weight: bold;
        }

        button[type="button"] {
            background: #ff9800;
        }

        button[type="button"]:hover {
            background: #fb8c00;
            transform: scale(1.05);
        }

        button[type="submit"] {
            background: #ff9800;
        }

        button[type="submit"]:hover {
            background: #fb8c00;
            transform: scale(1.05);
        }

        .back-button {
            background: #ff9800;
        }

        .back-button:hover {
            background: #fb8c00;
            transform: scale(1.05);
        }

        .total-amount {
            font-size: 1.3em;
            text-align: right;
            font-weight: bold;
            color: #ff9800;
            margin-top: 20px;
        }

        .back-link {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #fff;
            color: #000; /* Black */
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #ff9800;
            box-shadow: 0 0 5px #ff9800;
        }

        .form-group label span {
            color: #000; /* Black */
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="back-link">
            <button onclick="window.history.back()" class="back-button">Back</button>
        </div>
        <h1>Generate Invoice</h1>
        <form action="{{ route('saveInvoice', $invoice->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Bill to: <span class="info-label">{{ $report->customer->address }}</span></label>
            </div>
            <div class="form-group">
                <label>Invoice No: <span class="info-label">{{ $invoice->invoice_no }}</span></label>
            </div>
            <div class="form-group">
                <label>Date: <span class="info-label">{{ now()->toDateString() }}</span></label>
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
                <tbody id="invoice-items">
                    <!-- JavaScript will add items here -->
                </tbody>
            </table>
            <button type="button" onclick="addItem()">Add Item</button>
            <div class="form-group total-amount">
                <label>Total Amount: <span id="total-amount">0</span></label>
            </div>
            <button type="submit">Save Invoice</button>
        </form>
    </div>
    <script>
        let totalAmount = 0;

        function addItem() {
            const tableBody = document.getElementById('invoice-items');
            const row = document.createElement('tr');
            const itemNo = document.createElement('td');
            const description = document.createElement('td');
            const price = document.createElement('td');
            const amount = document.createElement('td');

            const itemIndex = document.querySelectorAll('#invoice-items tr').length;

            itemNo.innerHTML = `<input type="text" name="items[${itemIndex}][item_no]" required>`;
            description.innerHTML = `<input type="text" name="items[${itemIndex}][description]" required>`;
            price.innerHTML = `<input type="number" name="items[${itemIndex}][price]" required oninput="updateAmount(this)">`;
            amount.innerHTML = `<input type="text" name="items[${itemIndex}][amount]" readonly value="0">`;

            row.appendChild(itemNo);
            row.appendChild(description);
            row.appendChild(price);
            row.appendChild(amount);
            tableBody.appendChild(row);
        }

        function updateAmount(priceInput) {
            const row = priceInput.closest('tr');
            const amountInput = row.querySelector('input[name$="[amount]"]');
            const price = parseFloat(priceInput.value) || 0;
            amountInput.value = price.toFixed(2);

            calculateTotal();
        }

        function calculateTotal() {
            const amounts = document.querySelectorAll('input[name$="[amount]"]');
            totalAmount = 0;
            amounts.forEach(amountInput => {
                totalAmount += parseFloat(amountInput.value) || 0;
            });
            document.getElementById('total-amount').innerText = totalAmount.toFixed(2);
        }
    </script>
</body>
</html>
