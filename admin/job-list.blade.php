<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job List - Admin</title>

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
    <h1 class="text-xl font-bold">Job List - Admin</h1>

    <a href="{{ route('admin.dashboard') }}" 
       class="bg-red-500 px-4 py-1 rounded">
       Back Admin Dashboard
    </a>
</header>

<!-- MAIN -->
<main class="p-6">

    <div class="bg-white p-5 rounded shadow">

        <h2 class="text-lg font-semibold mb-4">All Jobs</h2>

        <table class="w-full border">

            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2">Title</th>
                    <th class="p-2">Company</th>
                    <th class="p-2">Location</th>
                    <th class="p-2">Salary</th>
                    <th class="p-2">Skills</th>
                    <th class="p-2">Job Type</th>
                    <th class="p-2">Experience</th>
                    <th class="p-2">Last Date</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>

            <tbody class="text-center">

                @forelse($jobs as $job)
                <tr class="border-t">

                    <td class="p-2">{{ $job->title }}</td>
                    <td class="p-2">{{ $job->company }}</td>
                    <td class="p-2">{{ $job->location }}</td>
                    <td class="p-2">{{ $job->salary }}</td>
                    <td class="p-2">{{ $job->skills }}</td>
                    <td class="p-2">{{ $job->job_type }}</td>
                    <td class="p-2">{{ $job->experience }}</td>

                    <td class="p-2">
                        {{ \Carbon\Carbon::parse($job->last_date)->format('d M Y') }}
                    </td>

                    <!-- ACTION BUTTONS -->
                    <td class="p-2 flex gap-2 justify-center">

                        <!-- ✅ EDIT (FIXED) -->
                        <a href="{{ route('admin.jobs.edit', $job->id) }}" 
                           class="bg-yellow-400 px-3 py-1 rounded hover:bg-yellow-500">
                           Edit
                        </a>

                        <!-- DELETE -->
                        <a href="{{ route('admin.jobs.delete', $job->id) }}" 
                           class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600"
                           onclick="return confirm('Are you sure?')">
                           Delete
                        </a>

                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="9" class="p-4 text-gray-500">
                        No Jobs Found
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</main>

</body>
</html>