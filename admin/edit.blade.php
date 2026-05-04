<h1>Edit Job</h1>

<form method="POST" action="{{ route('admin.jobs.update', $job->id) }}">
    @csrf
    @method('PUT') <!-- ✅ VERY IMPORTANT -->

    <input type="text" name="title" value="{{ old('title', $job->title) }}" placeholder="Job Title"><br><br>

    <input type="text" name="company" value="{{ old('company', $job->company) }}" placeholder="Company"><br><br>

    <input type="text" name="location" value="{{ old('location', $job->location) }}" placeholder="Location"><br><br>

    <input type="number" name="salary" value="{{ old('salary', $job->salary) }}" placeholder="Salary"><br><br>

    <input type="text" name="skills" value="{{ old('skills', $job->skills) }}" placeholder="Skills"><br><br>

    <textarea name="description" placeholder="Job Description">{{ old('description', $job->description) }}</textarea><br><br>

    <button type="submit">Update Job</button>
</form>