@extends('layouts.app')

@section('content')

<style>
.table-container {
    width: 90%;
    margin: auto;
    margin-top: 25px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

th {
    background: #2563eb;
    color: white;
    padding: 12px;
    font-size: 15px;
}

td {
    padding: 12px;
    text-align: center;
    font-size: 14px;
}

tr:nth-child(even) {
    background: #f3f4f6;
}

h2 {
    text-align: center;
    margin-top: 20px;
    font-family: Arial, sans-serif;
}

.badge {
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: bold;
    font-size: 13px;
}

.approved {
    background: #d1fae5;
    color: #065f46;
}

.pending {
    background: #fef3c7;
    color: #92400e;
}

.rejected {
    background: #fee2e2;
    color: #991b1b;
}

.empty {
    text-align: center;
    padding: 20px;
    color: #6b7280;
}
</style>

<h2>My Applications</h2>

<div class="table-container">

<table>

    <tr>
        <th>Job</th>
        <th>Company</th>
        <th>Date</th>
        <th>Status</th>
    </tr>

    @forelse($applications as $app)
    <tr>

        <td>{{ optional($app->job)->title ?? 'N/A' }}</td>

        <td>{{ optional($app->job)->company ?? 'N/A' }}</td>

        <td>
            {{ $app->created_at ? $app->created_at->format('d M Y') : 'N/A' }}
        </td>

        <td>
            @if($app->status == 'approved')
                <span class="badge approved">Selected</span>

            @elseif($app->status == 'pending')
                <span class="badge pending">Pending</span>

            @elseif($app->status == 'rejected')
                <span class="badge rejected">Rejected</span>

            @else
                <span>N/A</span>
            @endif
        </td>

    </tr>

    @empty
    <tr>
        <td colspan="4" class="empty">
            No Applications Found
        </td>
    </tr>
    @endforelse

</table>

</div>

@endsection