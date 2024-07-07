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
