<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-gradient-to-r from-orange-500 to-yellow-500 p-4 rounded-lg shadow-md">
            {{ __('Report History & Invoice ') }}
        </h2>
    </x-slot>

<!DOCTYPE html>
<html>
<head>
    <title>User Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        h1 {
            color: #ff7f50;
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            padding: 12px;
            text-align: center;
            background: linear-gradient(to right, #ff7f50, #ff7f50); /* Orange gradient */
            color: white; /* Text color */
        }

        td {
            padding: 12px;
            text-align: center;
            background-color: #fff; /* White background color */
        }

        .btn-blue {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-right: 10px;
        }

        .btn-red {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
        }

        .btn-blue:hover, .btn-red:hover {
            opacity: 0.8;
        }

        #search-bar {
            width: 80%;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: block;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>Your Completed Reports</h1>
    <input type="text" id="search-bar" placeholder="Search Reports" onkeyup="searchReports()">
    <table>
        <thead>
            <tr>
                <th>Report ID</th>
                <th>Device</th>
                <th>Service</th>
                <th>Problem Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="report-body">
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->device->brand }} {{ $report->device->model }}</td>
                    <td>{{ $report->service_type }}</td>
                    <td>{{ $report->problem_description }}</td>
                    <td>
                        <a href="{{ route('user-invoice-pdf', $report->invoice->id) }}" target="_blank" class="btn-blue">View Invoice</a>
                        <a href="{{ route('user.invoice.download', $report->invoice->id) }}" class="btn-red">Download PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function searchReports() {
            let query = document.getElementById('search-bar').value;
            let xhr = new XMLHttpRequest();
            xhr.open('GET', '/search-user-reports?search=' + query, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('report-body').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>
</x-app-layout>
