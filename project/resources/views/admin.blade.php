<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-8">Repair Forms</h1>
                    <div class="overflow-x-auto">
                        <table class="w-full divide-y divide-gray-200 rounded-lg overflow-hidden">
                            <thead class="bg-gradient-to-r from-blue-400 to-indigo-500 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">Smartphone Model</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">First Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">Last Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">Contact Number</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">Country</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">Street Address</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">City</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">State</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">Postal Code</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">Issue Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">Created At</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold tracking-wider">Updated At</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($repairForms as $form)
                                <tr class="transition-colors hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->smartphone_model }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->first_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->last_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->contact_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->country }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->street_address }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->city }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->state }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->postal_code }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->issue_description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->created_at }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $form->updated_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
