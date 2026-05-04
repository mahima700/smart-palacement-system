<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard - Smart Placement System</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

<!-- SUCCESS MESSAGE -->
@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 text-center">
        {{ session('success') }}
    </div>
@endif

<!-- HEADER -->
<header class="bg-blue-900 text-white p-4 flex justify-between items-center shadow">
    <h1 class="text-xl font-bold">Smart Placement System - Admin</h1>

    <!-- ✅ FIXED LOGOUT -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="bg-red-500 px-4 py-1 rounded">Logout</button>
    </form>
</header>

<div class="flex">

<!-- SIDEBAR -->
<aside class="w-64 bg-blue-800 text-white min-h-screen p-5">
    <ul class="space-y-4">

        <li class="hover:bg-blue-600 p-2 rounded">
            <a href="/admin/dashboard">Dashboard</a>
        </li>

        <li class="hover:bg-blue-600 p-2 rounded">
            <a href="{{ route('admin.students.list') }}">Students</a>
        </li>

        <li class="hover:bg-blue-600 p-2 rounded">
            <!-- ✅ FIXED -->
            <a href="{{ route('admin.jobs') }}">Add Job</a>
        </li>

        <li class="hover:bg-blue-600 p-2 rounded">
            <a href="{{ route('admin.jobs.list') }}">Job List</a>
        </li>

        <li class="hover:bg-blue-600 p-2 rounded">
            <a href="{{ route('admin.applications') }}">Applications</a>
        </li>

        <li class="hover:bg-blue-600 p-2 rounded">
            <!-- ✅ FIXED -->
            <a href="{{ route('admin.company') }}">Add Company</a>
        </li>

        <li class="hover:bg-blue-600 p-2 rounded">
            <!-- ✅ FIXED -->
            <a href="{{ route('admin.company.list') }}">Company List</a>
        </li>

    </ul>
</aside>

<!-- MAIN CONTENT -->
<main class="flex-1 p-6">

<!-- STATS -->
<div class="grid grid-cols-4 gap-6 mb-6">

    <div class="bg-white p-4 rounded shadow text-center">
        <h2 class="text-gray-500">Total Students</h2>
        <p class="text-2xl font-bold text-blue-700">
            {{ $totalStudents ?? 0 }}
        </p>
    </div>

    <div class="bg-white p-4 rounded shadow text-center">
        <h2 class="text-gray-500">Placed Students</h2>
        <p class="text-2xl font-bold text-green-600">
            {{ $placedStudents ?? 0 }}
        </p>
    </div>

    <div class="bg-white p-4 rounded shadow text-center">
        <h2 class="text-gray-500">Jobs</h2>
        <p class="text-2xl font-bold text-purple-600">
            {{ $totalJobs ?? 0 }}
        </p>
    </div>

    <div class="bg-white p-4 rounded shadow text-center">
        <h2 class="text-gray-500">Pending Applications</h2>
        <p class="text-2xl font-bold text-red-500">
            {{ $pendingApplications ?? 0 }}
        </p>
    </div>

</div>

<!-- QUICK ACTIONS -->
<div class="bg-white p-5 rounded shadow mb-6">
    <h2 class="text-lg font-semibold mb-4">Quick Actions</h2>

    <div class="flex gap-4">
        <a href="{{ route('admin.students.list') }}">
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Manage Students
            </button>
        </a>

        <a href="{{ route('admin.jobs.list') }}">
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Manage Jobs
            </button>
        </a>

        <a href="{{ route('admin.company.list') }}">
            <button class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                Company List
            </button>
        </a>
    </div>
</div>

<!-- RECENT JOBS -->
<div class="bg-white p-5 rounded shadow">
    <h2 class="text-lg font-semibold mb-4">Recent Jobs</h2>

    <table class="w-full border">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Job Title</th>
                <th class="p-2">Company</th>
                <th class="p-2">Job Type</th>
                <th class="p-2">Date</th>
            </tr>
        </thead>

        <tbody class="text-center">

            @forelse($recentJobs ?? [] as $job)
            <tr class="border-t">
                <td class="p-2">{{ $job->title }}</td>
                <td class="p-2">{{ $job->company }}</td>

                <td class="p-2 text-green-600">
                    {{ $job->job_type ?? 'N/A' }}
                </td>

                <td class="p-2">
                    {{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-4 text-gray-500">
                    No Jobs Available
                </td>
            </tr>
            @endforelse

        </tbody>
    </table>

</div>

</main>

</div>

</body>
</html>