<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student List</title>

<style>
body {
    background: #f4f6f9;
    font-family: Arial, sans-serif;
    margin: 0;
}

.header {
    background: #1e3a8a;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header span {
    font-size: 20px;
    font-weight: bold;
}

.back-btn {
    background: #ef4444;
    padding: 6px 12px;
    border-radius: 5px;
    color: white;
    text-decoration: none;
    font-size: 14px;
}

.back-btn:hover {
    background: #dc2626;
}

.container {
    width: 90%;
    margin: 30px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

h2 {
    margin-bottom: 15px;
}

.success {
    text-align: center;
    color: green;
    margin-bottom: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #e5e7eb;
    padding: 10px;
}

td {
    padding: 10px;
    text-align: center;
    border-top: 1px solid #ddd;
}

.btn {
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-size: 14px;
}

.edit {
    background: #facc15;
    color: black;
}

.delete {
    background: #ef4444;
    border: none;
    cursor: pointer;
}

.btn:hover {
    opacity: 0.8;
}
</style>

</head>

<body>

<div class="header">
    <span>Student List - Admin</span>

  <route('admin.students.edit', $student->id)>
        Back to Dashboard
    </a>
</div>

<div class="container">

    <h2>All Students</h2>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Course</th>
            <th>Skills</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @forelse($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->course }}</td>
            <td>{{ $student->skills }}</td>

            <!-- ✅ STATUS -->
            <td>
                @if($student->status == 'placed')
                    <span style="color:green; font-weight:bold;">Placed</span>
                @else
                    <span style="color:orange;">Pending</span>
                @endif
            </td>

            <td>
                <!-- ✅ FIXED EDIT ROUTE -->
                <a href="{{ route('admin.students.edit', $student->id) }}" class="btn edit">
                    Edit
                </a>

                <!-- ✅ FIXED DELETE -->
                <form action="{{ route('admin.students.delete', $student->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn delete" onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No Students Found</td>
        </tr>
        @endforelse

    </table>

</div>

</body>
</html>