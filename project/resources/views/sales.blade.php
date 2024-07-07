<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <table class="w-full bg-white shadow-md rounded-lg overflow-hidden sm:rounded-lg">
                <thead class="bg-orange-200 text-white">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Year</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Month</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-orange-700 uppercase tracking-wider">Total Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-orange-200">
                    @foreach ($sales as $sale)  
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ $sale->year }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ $sale->month }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ $sale->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex justify-center mt-4">
                <a href="{{ route('sales.download') }}" class="text-center text-white bg-red-500 hover:bg-red-600 py-2 px-4 rounded-lg shadow-md">Download PDF</a>
            </div>
        </div>
    </div>
</x-app-layout>
