<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job Form</title>
</head>

<body style="background:#f5f7fb; font-family:sans-serif;">

<!-- ✅ SUCCESS MESSAGE -->
@if(session('success'))
    <p style="color: green; text-align:center; font-weight:bold;">
        {{ session('success') }}
    </p>
@endif

<!-- ❌ VALIDATION ERRORS -->
@if ($errors->any())
    <ul style="color:red; text-align:center;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-container">

    <!-- ✅ Dynamic Title -->
    <h2>{{ isset($job) ? 'Edit Job' : 'Post New Job' }}</h2>

    <!-- ✅ FORM -->
    <form method="POST" 
    action="{{ isset($job) ? route('admin.jobs.update', $job->id) : route('admin.jobs.store') }}">
        @csrf

        <!-- ✅ FIXED METHOD -->
        @if(isset($job))
            @method('PUT')
        @endif

        <div class="grid">

            <!-- Job Title -->
            <div class="form-group">
                <label>Job Title</label>
                <input type="text" name="title" 
                value="{{ old('title', $job->title ?? '') }}"
                placeholder="Enter job title" required>
            </div>

            <!-- Company -->
            <div class="form-group">
                <label>Company</label>
                <input type="text" name="company" 
                value="{{ old('company', $job->company ?? '') }}"
                placeholder="Enter company name" required>
            </div>

            <!-- Location -->
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" 
                value="{{ old('location', $job->location ?? '') }}"
                placeholder="Enter location" required>
            </div>

            <!-- Salary -->
            <div class="form-group">
                <label>Salary</label>
                <input type="number" name="salary" 
                value="{{ old('salary', $job->salary ?? '') }}"
                placeholder="e.g. 30000">
            </div>

            <!-- Skills -->
            <div class="form-group full">
                <label>Skills Required</label>
                <input type="text" name="skills" 
                value="{{ old('skills', $job->skills ?? '') }}"
                placeholder="Java, Python, HTML">
            </div>

            <!-- Job Type -->
            <div class="form-group">
                <label>Job Type</label>
                <select name="job_type">
                    <option value="">Select</option>
                    <option value="Full-time" {{ (old('job_type', $job->job_type ?? '') == 'Full-time') ? 'selected' : '' }}>Full-time</option>
                    <option value="Internship" {{ (old('job_type', $job->job_type ?? '') == 'Internship') ? 'selected' : '' }}>Internship</option>
                    <option value="Part-time" {{ (old('job_type', $job->job_type ?? '') == 'Part-time') ? 'selected' : '' }}>Part-time</option>
                </select>
            </div>

            <!-- Experience -->
            <div class="form-group">
                <label>Experience</label>
                <input type="text" name="experience" 
                value="{{ old('experience', $job->experience ?? '') }}"
                placeholder="0-2 years">
            </div>

            <!-- Last Date -->
            <div class="form-group">
                <label>Last Date</label>
                <input type="date" name="last_date" 
                value="{{ old('last_date', isset($job->last_date) ? \Carbon\Carbon::parse($job->last_date)->format('Y-m-d') : '') }}">
            </div>

            <!-- Description -->
            <div class="form-group full">
                <label>Description</label>
                <textarea name="description" rows="4" 
                placeholder="Enter job description">{{ old('description', $job->description ?? '') }}</textarea>
            </div>

        </div>

        <button type="submit" class="submit-btn">
            {{ isset($job) ? 'Update Job' : 'Submit Job' }}
        </button>
    </form>
</div>

<style>

/* CONTAINER */
.form-container {
    width: 90%;
    max-width: 900px;
    margin: 40px auto;
    background: #fff;
    padding: 30px;
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* TITLE */
.form-container h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #1e3a8a;
}

/* GRID */
.grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

/* FULL WIDTH */
.full {
    grid-column: span 2;
}

/* FORM GROUP */
.form-group {
    display: flex;
    flex-direction: column;
}

/* LABEL */
label {
    margin-bottom: 6px;
    font-weight: 600;
}

/* INPUT */
input, select, textarea {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: 0.2s;
}

input:focus, select:focus, textarea:focus {
    border-color: #2563eb;
    outline: none;
    box-shadow: 0 0 5px rgba(37,99,235,0.3);
}

/* BUTTON */
.submit-btn {
    margin-top: 20px;
    width: 100%;
    padding: 13px;
    background: linear-gradient(45deg, #3b82f6, #2563eb);
    color: #fff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-weight: bold;
}

.submit-btn:hover {
    background: linear-gradient(45deg, #2563eb, #1e40af);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .grid {
        grid-template-columns: 1fr;
    }
    .full {
        grid-column: span 1;
    }
}

</style>

</body>
</html>