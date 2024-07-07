<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-4 text-sm font-medium text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-orange-50 border-b border-orange-200">
                    <h2 class="text-lg font-medium text-orange-900 mb-4">Completed Reports</h2>

                    <!-- Search Bar -->
                    <div class="mb-4 relative">
                        <input type="text" id="search-bar" placeholder="Search Reports" class="p-3 pl-10 w-full border border-orange-300 rounded focus:outline-none focus:ring focus:border-orange-400" onkeyup="searchReports()">
                        <svg class="absolute left-3 top-3 h-6 w-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0a7.5 7.5 0 1110.5-10.5 7.5 7.5 0 01-10.5 10.5z"></path>
                        </svg>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-orange-200" id="report-table">
                            <thead class="bg-orange-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Customer</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Device</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Service</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Problem</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-orange-200" id="report-body">
                                @foreach ($reports as $report)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="text-sm font-medium text-orange-900">{{ $report->customer->full_name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="text-sm text-orange-900">{{ $report->device->brand }} {{ $report->device->model }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="text-sm text-orange-900">{{ $report->service_type }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="text-sm text-orange-900">{{ $report->problem_description }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <form action="{{ route('invoice') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="report_id" value="{{ $report->id }}">
                                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Generate Invoice</button>
                                            </form>
                                            @if ($report->invoice)
                                                  <!-- Invoice ID: {{ $report->invoice->id }} -->
                                                <a href="{{ route('view-invoice', $report->invoice->id) }}" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View Invoice</a>
                                            @else
                                                No Invoice
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include the buttons' styles -->
    <style>
        #search-bar {
            background-color: #f3f4f6;
        }

        #search-bar:focus {
            background-color: #ffffff;
        }
    </style>

    <!-- Include the AJAX script -->
    <script>
        function searchReports() {
            let query = document.getElementById('search-bar').value;
            let xhr = new XMLHttpRequest();
            xhr.open('GET', '/searchReports?search=' + query, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('report-body').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</x-app-layout>
