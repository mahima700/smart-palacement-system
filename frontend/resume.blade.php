@extends('layouts.app')

@section('body-class', 'resume-page')

@section('content')

<!-- Resume Upload Form -->
<section class="resume-upload">
    <div class="main-wrapper">
        <div class="form-card">
            <h2>Job Application</h2>
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="input-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>

                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="input-group">
                    <label for="job_role">Job Role</label>
                    <select id="job_role" name="job_role" required>
                        <option value="" disabled selected>Select Job Role</option>
                        <option>Web Developer</option>
                        <option>Software Developer</option>
                        <option>Data Analyst</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="resume">Upload Resume</label>
                    <input type="file" id="resume" name="resume" required>
                </div>

                <button type="submit" class="btn-submit">Submit Application</button>
            </form>
        </div>
    </div>
</section>

@endsection