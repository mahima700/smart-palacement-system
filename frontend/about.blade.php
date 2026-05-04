@extends('layouts.app')

@section('body-class', 'about-page')

@section('content')

<!-- ABOUT SECTION -->
<section class="about">
    <div class="about-container">
        <div class="about-image">
            <img src="{{ asset('images/placement.jpg') }}" alt="Placement">
        </div>

        <div class="about-content">
            <h1>About Our Placement Portal</h1>
            <p>Smart Placement System helps students find the best job opportunities and connect with top companies.</p>
            <p>Companies can post job vacancies and students can easily apply for jobs through the portal. This system makes the placement process faster and more efficient.</p>
        </div>
    </div>
</section>

<!-- MISSION SECTION -->
<section class="mission">
    <div class="mission-container">
        <div class="mission-content">
            <h2>Our Mission</h2>
            <p>Our mission is to bridge the gap between students and companies by providing a smart placement system.</p>
            <p>We aim to improve campus placements and help students build successful careers while helping companies find talented candidates.</p>
        </div>

        <div class="mission-image">
            <img src="{{ asset('images/mission.jpg') }}" alt="Mission">
        </div>
    </div>
</section>

<!-- BENEFITS SECTION -->
<section class="benefits">
    <h2>Benefits for Students</h2>
    <div class="benefit-container">
        <div class="benefit-card">
            <h3>Latest Jobs</h3>
            <p>Students can access latest job opportunities from top companies.</p>
        </div>

        <div class="benefit-card">
            <h3>Easy Apply</h3>
            <p>Students can easily apply for jobs through the portal.</p>
        </div>

        <div class="benefit-card">
            <h3>Top Companies</h3>
            <p>Connect with leading companies and recruiters.</p>
        </div>

        <div class="benefit-card">
            <h3>Resume Upload</h3>
            <p>Upload your resume and track job applications easily.</p>
        </div>
    </div>
</section>

@endsection