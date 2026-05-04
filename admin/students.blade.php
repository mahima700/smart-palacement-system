<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>

    <style>
        body {
            background: #f5f7fa;
            font-family: Arial, sans-serif;
        }

        .form-container {
            width: 90%;
            max-width: 500px;
            margin: 40px auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: 0.3s;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0,123,255,0.3);
        }

        button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .success {
            text-align: center;
            color: green;
            margin-bottom: 10px;
        }

        .error {
            color: red;
            font-size: 13px;
        }

        .error-list {
            background: #ffe5e5;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="form-container">

    <h2>{{ isset($student) ? 'Edit Student' : 'Add Student' }}</h2>

    <!-- SUCCESS -->
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <!-- GLOBAL ERRORS -->
    @if ($errors->any())
        <div class="error-list">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM -->
    <form method="POST"
        action="{{ isset($student) ? route('admin.students.update', $student->id) : route('admin.students.store') }}">

        @csrf

        @if(isset($student))
            @method('PUT')
        @endif

        <!-- NAME -->
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name"
                value="{{ old('name', $student->name ?? '') }}"
                placeholder="Enter name" required>
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <!-- EMAIL -->
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"
                value="{{ old('email', $student->email ?? '') }}"
                placeholder="Enter email" required>
            @error('email') <p class="error">{{ $message }}</p> @enderror
        </div>

        <!-- PHONE -->
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone"
                value="{{ old('phone', $student->phone ?? '') }}"
                placeholder="Enter phone" required>
            @error('phone') <p class="error">{{ $message }}</p> @enderror
        </div>

        <!-- COURSE -->
        <div class="form-group">
            <label>Course</label>
            <input type="text" name="course"
                value="{{ old('course', $student->course ?? '') }}"
                placeholder="Enter course" required>
            @error('course') <p class="error">{{ $message }}</p> @enderror
        </div>

        <!-- SKILLS -->
        <div class="form-group">
            <label>Skills</label>
            <input type="text" name="skills"
                value="{{ old('skills', $student->skills ?? '') }}"
                placeholder="Enter skills" required>
            @error('skills') <p class="error">{{ $message }}</p> @enderror
        </div>

        <!-- STATUS -->
        <div class="form-group">
            <label>Status</label>
            <select name="status" required>
                <option value="">Select Status</option>
                <option value="pending" {{ old('status', $student->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="placed" {{ old('status', $student->status ?? '') == 'placed' ? 'selected' : '' }}>Placed</option>
            </select>
        </div>

        <!-- BUTTON -->
        <button type="submit">
            {{ isset($student) ? 'Update Student' : 'Add Student' }}
        </button>

    </form>

</div>

</body>
</html>