<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar-link {
            transition: 0.3s;
        }
        .sidebar-link:hover, .active {
            background: #eef2ff;
            color: #4f46e5;
        }
    </style>
</head>

<body class="bg-gray-100">

<!-- Sidebar -->
<div class="w-64 h-screen bg-white shadow-lg fixed">

    <div class="p-5 border-b">
        <h2 class="text-xl font-bold text-indigo-600">🎓 Placement</h2>
    </div>

    <div class="p-4 space-y-2">

        <a href="{{ route('dashboard') }}" class="sidebar-link active flex items-center gap-3 p-3 rounded-lg">
            🏠 Dashboard
        </a>

        <a href="{{ url('/jobs') }}" class="sidebar-link flex items-center gap-3 p-3 rounded-lg">
            💼 Jobs
        </a>

    <a href="{{ route('my.applications') }}" class="sidebar-link flex items-center gap-3 p-3 rounded-lg">
            📄 Applications
        </a>

        <a href="{{ url('/profile') }}" class="sidebar-link flex items-center gap-3 p-3 rounded-lg">
            👤 Profile
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="sidebar-link text-red-500 w-full text-left p-3 rounded-lg">
                🚪 Logout
            </button>
        </form>

    </div>

</div>

<!-- Main Content -->
<div class="ml-64 p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Dashboard</h1>

        <span class="text-gray-500">
            Welcome, {{ auth()->user()->name }} 👋
        </span>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-gray-500 text-sm">Total Applications</h3>
            <p class="text-2xl font-bold mt-2 text-indigo-600">
                {{ $totalApplications }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-gray-500 text-sm">Selected</h3>
            <p class="text-2xl font-bold mt-2 text-green-600">
                {{ $selected }}
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-gray-500 text-sm">Pending</h3>
            <p class="text-2xl font-bold mt-2 text-yellow-500">
                {{ $pending }}
            </p>
        </div>

    </div>

    <!-- Recent Applications -->
    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-lg font-bold mb-4">Recent Applications</h2>

        @if($applications->isEmpty())
            <p class="text-center text-red-500">No Applications Found</p>
        @else

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-indigo-600 text-white">
                    <th class="p-3">Job</th>
                    <th class="p-3">Company</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($applications as $app)
                <tr class="text-center border-b">
                    <td class="p-3">{{ $app->job->title ?? 'N/A' }}</td>
                    <td class="p-3">{{ $app->job->company ?? 'N/A' }}</td>

                    <td class="p-3">
                        @if($app->status == 'approved')
                            <span class="text-green-600 font-bold">Selected</span>
                        @elseif($app->status == 'pending')
                            <span class="text-yellow-500 font-bold">Pending</span>
                        @else
                            <span class="text-red-500 font-bold">Rejected</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif

    </div>

</div>

</body>
</html>