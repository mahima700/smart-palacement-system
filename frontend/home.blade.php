@extends('layouts.app')

@section('body-class', 'home-page')

@section('content')

<!-- MARQUEE -->
<div class="about-marquee">
    <marquee behavior="scroll" direction="left" scrollamount="6">
        🚀 Welcome to Smart Placement Portal | Find Best Jobs | Connect with Top Companies | Build Your Career 🚀
    </marquee>
</div>

<!-- HERO SECTION -->
<section class="hero">
    <h1>Find Your Dream Job</h1>
    <p>Connect with top companies and explore best career opportunities.</p>
    <a href="{{ url('/jobs') }}" class="btn">Browse Jobs</a>

    <div class="search-box">
        <input type="text" placeholder="Search jobs or companies">
        <button>Search</button>
    </div>
</section>

<!-- FEATURES -->
<section class="features">
    <h2>Portal Features</h2>
    <div class="card">
        <h2>Latest Jobs</h2>
        <p>Daily updated job opportunities for students.</p>
    </div>
    <div class="card">
        <h2>Top Companies</h2>
        <p>Top companies hire students from our portal.</p>
    </div>
    <div class="card">
        <h2>Easy Apply</h2>
        <p>Apply for jobs quickly with simple steps.</p>
    </div>
</section>

<!-- PLACEMENT STATS -->
<section class="stats">
    <h2>Placements Stats</h2>
    <div class="stat-box">
        <h3>500+</h3>
        <p>Students Placed</p>
    </div>
    <div class="stat-box">
        <h3>120+</h3>
        <p>Partner Companies</p>
    </div>
    <div class="stat-box">
        <h3>300+</h3>
        <p>Active Jobs</p>
    </div>
    <div class="stat-box">
        <h3>95%</h3>
        <p>Placement Rate</p>
    </div>
</section>

<!-- HIRING PARTNERS -->
<section class="companies">
    <h2>Our Hiring Partners</h2>
    <div class="company-list">
        <div class="company">TCS</div>
        <div class="company">Infosys</div>
        <div class="company">Wipro</div>
        <div class="company">HCL</div>
    </div>
</section>

<!-- TOP RECRUITING COMPANIES -->
<section class="logo-slider">
    <h2>Top Recruiting Companies</h2>
    <div class="slider">
        <div class="slider-track">
            <div class="slide">TCS</div>
            <div class="slide">Infosys</div>
            <div class="slide">Wipro</div>
            <div class="slide">HCL</div>
            <div class="slide">Accenture</div>
            <div class="slide">Capgemini</div>
            <div class="slide">IBM</div>
            <div class="slide">Tech Mahindra</div>
            <!-- Repeat for continuous scroll -->
            <div class="slide">TCS</div>
            <div class="slide">Infosys</div>
            <div class="slide">Wipro</div>
            <div class="slide">HCL</div>
            <div class="slide">Accenture</div>
            <div class="slide">Capgemini</div>
            <div class="slide">IBM</div>
            <div class="slide">Tech Mahindra</div>
        </div>
    </div>
</section>

@endsection