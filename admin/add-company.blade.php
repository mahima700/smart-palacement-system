<!DOCTYPE html>
<html>
<head>
    <title>Add Company</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold text-indigo-600 mb-4">➕ Add Company</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.company.store') }}">
        @csrf

        <input type="text" name="name" placeholder="Company Name"
               class="w-full border p-2 mb-3 rounded" required>

        <input type="email" name="email" placeholder="Email"
               class="w-full border p-2 mb-3 rounded">

        <input type="text" name="location" placeholder="Location"
               class="w-full border p-2 mb-3 rounded">

        <textarea name="description" placeholder="Description"
                  class="w-full border p-2 mb-3 rounded"></textarea>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">
            Add Company
        </button>

    </form>

</div>

</body>
</html>