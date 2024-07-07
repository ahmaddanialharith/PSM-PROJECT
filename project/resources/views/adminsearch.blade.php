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
            <a href="{{ route('admin-view', $report->id) }}" class="view-button">View</a>
        </td>
    </tr>
@endforeach
