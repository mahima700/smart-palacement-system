<!DOCTYPE html>
<html>
<head>
    <title>Applications</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .page-title {
            text-align: center;
            margin: 20px;
            font-size: 28px;
            font-weight: bold;
        }

        .success {
            text-align: center;
            color: green;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .table-container {
            width: 95%;
            margin: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #2563eb;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e7ff;
        }

        .empty {
            text-align: center;
            color: red;
            font-size: 18px;
        }

        .btn {
            padding: 6px 10px;
            border-radius: 5px;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .approve {
            background: green;
        }

        .reject {
            background: red;
        }

        .pending {
            color: orange;
            font-weight: bold;
        }

        .approved {
            color: green;
            font-weight: bold;
        }

        .rejected {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

<h2 class="page-title">All Applications</h2>

@if(session('success'))
    <p class="success">
        {{ session('success') }}
    </p>
@endif

<div class="table-container">

@if($applications->isEmpty())
    <p class="empty">No Applications Found</p>
@else

<table>
    <thead>
        <tr>
            <th>Job</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($applications as $app)
        <tr>

            <td>{{ $app->job->title ?? 'N/A' }}</td>

            <td>{{ $app->name }}</td>
            <td>{{ $app->email }}</td>

            <!-- ✅ FIXED -->
            <td>
                @if($app->status === 'pending')
                    <span class="pending">Pending</span>
                @elseif($app->status === 'approved')
                    <span class="approved">Approved</span>
                @elseif($app->status === 'rejected')
                    <span class="rejected">Rejected</span>
                @else
                    <span>Unknown</span>
                @endif
            </td>

            <td>
                {{ $app->created_at ? $app->created_at->format('d M Y') : 'N/A' }}
            </td>

            <td>

                @if($app->status === 'pending')

                    <form action="{{ route('application.approve', $app->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn approve">Approve</button>
                    </form>

                    <form action="{{ route('application.reject', $app->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn reject">Reject</button>
                    </form>

                @elseif($app->status === 'approved')
                    <span class="approved">✔ Approved</span>
                @else
                    <span class="rejected">❌ Rejected</span>
                @endif

            </td>

        </tr>
        @endforeach
    </tbody>

</table>

@endif

</div>

</body>
</html>