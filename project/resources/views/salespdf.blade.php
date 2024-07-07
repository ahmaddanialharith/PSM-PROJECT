<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        h1 {
            color: #e76f51; /* Lighter orange color */
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
        }
        th, td {
            border: 1px solid #e76f51; /* Lighter orange border */
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #fae1d3; /* Lighter background color for header */
            color: #e76f51; /* Lighter orange text */
        }
        tr:nth-child(even) {
            background-color: #fff5ec; /* Even row background color */
        }
        tr:hover {
            background-color: #fce4d9; /* Hover row background color */
        }
    </style>
</head>
<body>
    <h1>Sales Report</h1>

    <table>
        <tr>
            <th>Year</th>
            <th>Month</th>
            <th>Total Amount</th>
        </tr>
        @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->year }}</td>
                <td>{{ $sale->month }}</td>
                <td>{{ $sale->total }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
