<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-orange-50 border-b border-orange-200">
                    <h2 class="text-lg font-medium text-orange-900 mb-4">Report</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-orange-200">
                            <thead class="bg-orange-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Customer</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Device</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-orange-200">
                                @foreach ($reports as $report)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="text-sm font-medium text-orange-900">{{ $report->customer->full_name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="text-sm text-orange-900">{{ $report->device->brand }} {{ $report->device->model }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            @if ($report->status == 'Pending')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Pending
                                                </span>
                                            @elseif ($report->status == 'In Progress')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    In Progress
                                                </span>
                                            @elseif ($report->status == 'Completed')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Completed
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <a href="{{ route('admin-view', $report->id) }}" class="text-blue-600 hover:text-blue-900">View</a>
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

    <!-- Chat Us Button -->
    <a href="{{ url('/chatify') }}" class="chat-us-button">Chat</a>

    <!-- Include the button's styles -->
    <style>
        .chat-us-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            padding: 15px 25px;
            border-radius: 50px;
            text-align: center;
            text-decoration: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        .chat-us-button:hover {
            background-color: #0056b3;
        }
    </style>
</x-app-layout>
