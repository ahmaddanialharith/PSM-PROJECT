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
                Invoice ID: {{ $report->invoice->id }}
                <a href="{{ route('view-invoice', $report->invoice->id) }}" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View Invoice</a>
            @else
                No Invoice
            @endif
        </td>
    </tr>
@endforeach
