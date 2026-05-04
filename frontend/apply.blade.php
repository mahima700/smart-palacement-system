@extends('layouts.app')

@section('body-class', 'resume-page')

@section('content')

<section class="resume-upload">
    <div class="main-wrapper">
        <div class="form-card">

            <h2 style="text-align:center;">Job Application</h2>

            <!-- SUCCESS -->
            @if(session('success'))
                <p style="color:green; text-align:center;">
                    {{ session('success') }}
                </p>
            @endif

            <!-- ERROR -->
            @if(session('error'))
                <p style="color:red; text-align:center;">
                    {{ session('error') }}
                </p>
            @endif

            <!-- VALIDATION -->
            @if ($errors->any())
                <ul style="color:red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <!-- NOT LOGIN -->
            @guest
                <p style="color:red; text-align:center;">
                    Please <a href="{{ route('login') }}">login</a> to apply for this job.
                </p>
            @endguest

            <!-- LOGIN USER -->
            @auth
            @if(isset($job))
            <form action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- ✅ FIXED: JOB ID -->
                <input type="hidden" name="job_id" value="{{ $job->id }}">

                <!-- NAME -->
                <div class="input-group">
                    <label>Full Name</label>
                    <input type="text" name="name" 
                        value="{{ auth()->user()->name }}" readonly>
                </div>

                <!-- EMAIL -->
                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" 
                        value="{{ auth()->user()->email }}" readonly>
                </div>

                <!-- PHONE -->
                <div class="input-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" 
                        value="{{ old('phone') }}"
                        placeholder="Enter phone (optional)">
                </div>

                <!-- JOB -->
                <div class="input-group">
                    <label>Job Role</label>
                    <input type="text" value="{{ $job->title }}" readonly>
                </div>

                <!-- RESUME -->
                <div class="input-group">
                    <label>Upload Resume</label>
                    <input type="file" name="resume">
                </div>

                <button type="submit" class="btn-submit">
                    Submit Application 🚀
                </button>
            </form>
            @else
                <p style="color:red; text-align:center;">
                    Job not found ❌
                </p>
            @endif
            @endauth

        </div>
    </div>
</section>

@endsection