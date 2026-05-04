@extends('layouts.app')

@section('body-class', 'jobs-page')

@section('content')

<section class="jobs">

<h1>Latest Job Vacancies</h1>

@if(session('success'))
    <div class="success-msg">
        {{ session('success') }}
    </div>
@endif

<!-- SEARCH -->
<div class="job-search">
    <input type="text" id="searchInput" placeholder="Search by Job Role">

    <select id="skillFilter">
        <option value="">Select Skill</option>
        <option value="Java">Java</option>
        <option value="Python">Python</option>
        <option value="HTML">HTML</option>
        <option value="CSS">CSS</option>
        <option value="JavaScript">JavaScript</option>
    </select>

    <button onclick="searchJobs()">Search</button>
</div>

<div class="wrapper">
<div class="job-container" id="jobContainer">

@forelse($jobs as $job)

<div class="job-card"
     data-role="{{ strtolower($job->title) }}"
     data-skill="{{ strtolower($job->skills ?? '') }}">

    <span class="badge">NEW</span>

    <h3>{{ rtrim($job->title, ',') }}</h3>

    <p><b>Company:</b> {{ $job->company }}</p>
    <p><b>Location:</b> {{ $job->location }}</p>

    <p class="salary">₹{{ $job->salary }}</p>

    <p><b>Job Type:</b> {{ $job->job_type }}</p>
    <p><b>Experience:</b> {{ $job->experience }} Years</p>
    <p><b>Last Date:</b> 
        {{ $job->last_date ? \Carbon\Carbon::parse($job->last_date)->format('d M Y') : 'N/A' }}
    </p>

    <div class="skills">
        @if($job->skills)
            @foreach(explode(',', $job->skills) as $skill)
                <span>{{ trim($skill) }}</span>
            @endforeach
        @else
            <span>No Skills</span>
        @endif
    </div>

    <!-- APPLY BUTTON LOGIC -->
    @auth

        @if(in_array($job->id, $appliedJobs))
            <button class="apply-btn" style="background:gray; cursor:not-allowed;">
                Already Applied
            </button>
        @else
            <a href="{{ route('apply.form', $job->id) }}">
                <button class="apply-btn">Apply Now</button>
            </a>
        @endif

    @else
        <a href="{{ route('login') }}">
            <button class="apply-btn">Login to Apply</button>
        </a>
    @endauth

</div>

@empty
<p style="text-align:center;">No Jobs Available</p>
@endforelse

</div>
</div>

</section>

<script>
function searchJobs(){
    let search = document.getElementById("searchInput").value.toLowerCase();
    let skill = document.getElementById("skillFilter").value.toLowerCase();
    let jobs = document.querySelectorAll(".job-card");

    jobs.forEach(function(job){
        let role = job.dataset.role;
        let skillTag = job.dataset.skill;

        if((role.includes(search) || search=="") && (skillTag.includes(skill) || skill=="")){
            job.style.display="block";
        } else {
            job.style.display="none";
        }
    });
}
</script>

@endsection