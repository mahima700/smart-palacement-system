<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <h2 class="text-2xl font-bold mb-6 text-indigo-600">👤 My Profile</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label class="block text-sm mb-1">Name</label>
            <input type="text" name="name"
                   value="{{ auth()->user()->name }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-sm mb-1">Email</label>
            <input type="email" name="email"
                   value="{{ auth()->user()->email }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block text-sm mb-1">New Password (optional)</label>
            <input type="password" name="password"
                   class="w-full border p-2 rounded">
        </div>

        <!-- Button -->
        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Update Profile
        </button>

    </form>

</div>

</body>
</html>