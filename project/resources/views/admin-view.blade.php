<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-lg">
                <div class="p-6 bg-gradient-to-br from-gray-100 to-gray-200 border-b border-gray-300 rounded-lg shadow-md">
                    <!-- Customer Information -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Customer Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 md:gap-x-8">
                            <div>
                                <p><span class="font-semibold text-gray-800">Full Name:</span> {{ $report->customer->full_name }}</p>
                                <p><span class="font-semibold text-gray-800">Contact Number:</span> {{ $report->customer->contact_number }}</p>
                                <p><span class="font-semibold text-gray-800">Email:</span> {{ $report->customer->email }}</p>
                                <p><span class="font-semibold text-gray-800">Address:</span> {{ $report->customer->address }}</p>
                            </div>
                            <div>
                                <p><span class="font-semibold text-gray-800">Area:</span> {{ $report->customer->area }}</p>
                                <p><span class="font-semibold text-gray-800">State:</span> {{ $report->customer->state }}</p>
                                <p><span class="font-semibold text-gray-800">Postal Code:</span> {{ $report->customer->postal_code }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Device Information -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Device Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 md:gap-x-8">
                            <div>
                                <p><span class="font-semibold text-gray-800">Brand:</span> {{ $report->device->brand }}</p>
                                <p><span class="font-semibold text-gray-800">Model:</span> {{ $report->device->model }}</p>
                            </div>
                            <div>
                                <p><span class="font-semibold text-gray-800">Color:</span> {{ $report->device->color }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Issue Description -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Issue Description</h3>
                        <div class="space-y-4">
                            <p><span class="font-semibold text-gray-800">Problem Description:</span> {{ $report->problem_description }}</p>
                            <p><span class="font-semibold text-gray-800">Previous Repairs Done:</span> {{ $report->previous_repairs }}</p>
                            <div>
                                <p class="font-semibold text-gray-800 mb-2">Pictures:</p>
                                <img src="{{ Storage::url($report->pictures) }}" alt="Repair Image" class="w-48 rounded-lg border border-gray-300 shadow-md">
                            </div>
                        </div>
                    </div>

                    <!-- Service Type -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Service Type</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 md:gap-x-8">
                            <div>
                                <p><span class="font-semibold text-gray-800">Type of Service Required:</span> {{ $report->service_type }}</p>
                            </div>
                            <div>
                                <p><span class="font-semibold text-gray-800">Urgency Level:</span> {{ $report->urgency_level }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Warranty Information -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Warranty Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 md:gap-x-8">
                            <div>
                                <p><span class="font-semibold text-gray-800">Is the Device Under Warranty?:</span> {{ $report->under_warranty }}</p>
                            </div>
                            <div>
                                <p><span class="font-semibold text-gray-800">Warranty Provider:</span> {{ $report->warranty_provider }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Data and Privacy -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Data and Privacy</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 md:gap-x-8">
                            <div>
                                <p><span class="font-semibold text-gray-800">Is Data Backup Required?:</span> {{ $report->data_backup_required }}</p>
                                <p><span class="font-semibold text-gray-800">Consent to Data Wipe if Necessary:</span> {{ $report->data_wipe_consent }}</p>
                            </div>
                            <div>
                                <p><span class="font-semibold text-gray-800">Any Sensitive Data to be Aware of?:</span> {{ $report->sensitive_data }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Update Status Form -->
                    <div>
                        <form method="POST" action="{{ route('admin.updateStatus', $report->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select id="status" name="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="Pending" {{ $report->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="In Progress" {{ $report->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ $report->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 hover:bg-orange-600 active:bg-orange-700 transition ease-in-out duration-150">
                                    Update Status
                                </button>
                            </div>
                        </form>
                        <div class="mt-6">
                        <a href="{{ route('admin') }}" class="text-sm text-gray-500 underline">← Back to Admin Dashboard</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
