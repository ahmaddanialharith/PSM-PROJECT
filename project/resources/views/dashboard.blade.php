<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-gradient-to-r from-orange-500 to-yellow-500 p-4 rounded-lg shadow-md">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-xl">
                <div class="bg-gradient-to-r from-orange-400 to-yellow-400 p-8 rounded-t-lg">
                    <h3 class="text-xl font-extrabold text-white mb-6">Your Report Status</h3>
                    @if(isset($reports))
                        @foreach ($reports as $report)
                            <div class="mb-6 p-6 bg-white border border-gray-200 rounded-lg shadow-md relative">
                                <!-- Gradient Accent Bar -->
                                <div class="absolute top-0 left-0 w-full h-2 rounded-t-lg bg-gradient-to-r from-orange-400 to-yellow-400"></div>
                                <div class="flex justify-between items-center mb-4">
                                    <h4 class="text-xl font-semibold text-gray-800">Report #{{ $report->id }}</h4>
                                    <div class="px-4 py-1 rounded-full shadow-md text-center w-32"
                                         style="
                                             background-color: {{ $report->status == 'Pending' ? '#FF5733' : ($report->status == 'In Progress' ? '#3182CE' : '#38A169') }};
                                             color: white;
                                         ">
                                        {{ $report->status }}
                                    </div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden mb-4">
                                    <div class="text-xs font-bold text-center leading-none h-full rounded-full"
                                         style="
                                             width: {{ $report->status == 'Pending' ? '0%' : ($report->status == 'In Progress' ? '50%' : '100%') }};
                                             background-color: {{ $report->status == 'Pending' ? '#FF5733' : ($report->status == 'In Progress' ? '#3182CE' : '#38A169') }};
                                             color: black;
                                         ">
                                        <span class="block relative top-1/2 transform -translate-y-1/2">
                                            {{ $report->status == 'Pending' ? '0%' : ($report->status == 'In Progress' ? '50%' : '100%') }}
                                        </span>
                                    </div>
                                </div>
                                <p class="mb-2 text-gray-700"><strong>Problem Description:</strong> {{ $report->problem_description }}</p>
                                <p class="text-gray-700"><strong>Device:</strong> {{ $report->device->brand }} {{ $report->device->model }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="text-orange-700 text-xl">You have no reports yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Us Button -->
    <a href="{{ url('/chatify') }}" class="chat-us-button">Chat Us</a>

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
