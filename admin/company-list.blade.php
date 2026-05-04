<!DOCTYPE html>
<html>
<head>
    <title>Company List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">🏢 Company List</h2>

        <a href="{{ route('admin.dashboard') }}" 
           class="bg-red-500 text-white px-4 py-1 rounded">
            Back
        </a>
    </div>

    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-3 rounded text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- TABLE -->
    <table class="w-full border border-gray-300">

        <thead>
            <tr class="bg-indigo-600 text-white">
                <th class="p-2">Name</th>
                <th class="p-2">Email</th>
                <th class="p-2">Location</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($companies as $c)
        <tr class="text-center border-b hover:bg-gray-50">

            <td class="p-2">{{ $c->name }}</td>
            <td class="p-2">{{ $c->email }}</td>
            <td class="p-2">{{ $c->location }}</td>

            <!-- ACTIONS -->
            <td class="p-2 space-x-2">

                <!-- EDIT -->
                <a href="{{ route('admin.company.edit', $c->id) }}"
                   class="bg-yellow-400 px-3 py-1 rounded text-black hover:bg-yellow-500">
                    Edit
                </a>

                <!-- DELETE (BEST PRACTICE: FORM use karo) -->
                <form action="{{ route('admin.company.delete', $c->id) }}" 
                      method="GET" 
                      class="inline"
                      onsubmit="return confirm('Are you sure?')">

                    <button class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
                        Delete
                    </button>

                </form>

            </td>
        </tr>

        @empty
        <tr>
            <td colspan="4" class="text-center p-4 text-gray-500">
                No Company Found
            </td>
        </tr>
        @endforelse

        </tbody>
    </table>

</div>

</body>
</html>