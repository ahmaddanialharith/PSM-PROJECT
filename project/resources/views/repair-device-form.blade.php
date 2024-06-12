<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight bg-gradient-to-r from-orange-500 to-yellow-500 p-4 rounded-lg shadow-md">
            {{ __('Repair Form') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8 border-t-4 border-orange-500">
                <form action="{{ route('repair-device.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    <!-- Customer Information -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">👤 Customer Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="full_name" class="block mb-2 text-gray-800">Full Name:</label>
                                <input type="text" name="full_name" placeholder="Enter full name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                            </div>
                            <div>
                                <label for="contact_number" class="block mb-2 text-gray-800">Contact Number:</label>
                                <input type="text" name="contact_number" placeholder="Enter contact number" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-gray-800">Email Address:</label>
                                <input type="email" name="email" placeholder="Enter email address" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                            </div>
                            <div>
                                <label for="address" class="block mb-2 text-gray-800">Address:</label>
                                <input type="text" name="address" placeholder="Enter address" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                            </div>
                            <div>
                                <label for="postal_code" class="block mb-2 text-gray-800">Postal Code:</label>
                                <input type="text" name="postal_code" placeholder="Enter postal code" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Device Information -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">📱 Device Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="device_brand" class="block mb-2 text-gray-800">Device Brand:</label>
                                <select name="device_brand" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                                    <option value="">Select device brand</option>
                                    <option value="Apple">Apple</option>
                                    <option value="Samsung">Samsung</option>
                                    <option value="Xiaomi">Xiaomi</option>
                                    <option value="Realme">Realme</option>
                                    <option value="OnePlus">OnePlus</option>
                                </select>
                            </div>
                            <div>
                                <label for="device_model" class="block mb-2 text-gray-800">Device Model:</label>
                                <input type="text" name="device_model" placeholder="Enter device model" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                            </div>
                            <div>
                                <label for="color" class="block mb-2 text-gray-800">Color:</label>
                                <input type="text" name="color" placeholder="Enter device color" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Issue Description -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">🛠️ Issue Description</h2>
                        <div class="space-y-4">
                            <div>
                                <label for="problem_description" class="block mb-2 text-gray-800">Problem Description:</label>
                                <textarea name="problem_description" placeholder="Describe the issue" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300"></textarea>
                            </div>
                            <div>
                                <label for="previous_repairs" class="block mb-2 text-gray-800">Any Previous Repairs Done:</label>
                                <select name="previous_repairs" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div>
                                <label for="pictures" class="block mb-2 text-gray-800">Upload Pictures:</label>
                                <input type="file" name="pictures" class="w-full">
                            </div>
                        </div>
                    </div>

                    <!-- Service Type -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">⚙️ Service Type</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="service_type" class="block mb-2 text-gray-800">Type of Service Required:</label>
                                <select name="service_type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                                    <option value="">Select Service Type</option>
                                    <option value="Screen Replacement">Screen Replacement</option>
                                    <option value="Battery Replacement">Battery Replacement</option>
                                    <option value="Diagnostic Service">Diagnostic Service</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label for="urgency_level" class="block mb-2 text-gray-800">Urgency Level:</label>
                                <select name="urgency_level" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                                    <option value="">Select Urgency Level</option>
                                    <option value="Standard Service">Standard Service</option>
                                    <option value="Express Service">Express Service (Extra Charge)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Warranty Information -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">🔒 Warranty Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="under_warranty" class="block mb-2 text-gray-800">Is the Device Under Warranty:</label>
                                <select name="under_warranty" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div>
                                <label for="warranty_provider" class="block mb-2 text-gray-800">Warranty Provider:</label>
                                <input type="text" name="warranty_provider" placeholder="Enter warranty provider" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Data and Privacy -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">🔐 Data and Privacy</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="data_backup_required" class="block mb-2 text-gray-800">Is Data Backup Required:</label>
                                <select name="data_backup_required" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div>
                                <label for="data_wipe_consent" class="block mb-2 text-gray-800">Consent to Data Wipe if Necessary:</label>
                                <select name="data_wipe_consent" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300">
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="sensitive_data" class="block mb-2 text-gray-800">Any Sensitive Data to be Aware of?:</label>
                            <textarea name="sensitive_data" placeholder="Enter sensitive data (if any)" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 transition duration-300"></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-gradient-to-r from-orange-500 to-yellow-500 hover:from-orange-600 hover:to-yellow-600 text-white font-semibold py-2 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
