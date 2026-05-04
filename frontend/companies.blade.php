@extends('layouts.app')

@section('body-class', 'companies-body')

@section('content')
<section class="companies-page">

    <h1>Top Hiring Company</h1>

    <div class="company-container">

        <div class="company-card">
            <img src="{{ asset('images/tcs.png') }}" class="company-logo" alt="TCS">
            <h3>TCS</h3>
            <p><b>Location:</b> Noida</p>
            <p><b>Role:</b> Software Developer</p>
            <a href="{{ url('/jobs') }}" class="company-btn">View Jobs</a>
        </div>

        <div class="company-card">
            <img src="{{ asset('images/infosys.png') }}" class="company-logo" alt="Infosys">
            <h3>Infosys</h3>
            <p><b>Location:</b> Bangalore</p>
            <p><b>Role:</b> Web Developer</p>
            <a href="{{ url('/jobs') }}" class="company-btn">View Jobs</a>
        </div>

        <div class="company-card">
            <img src="{{ asset('images/wipro.png') }}" class="company-logo" alt="Wipro">
            <h3>Wipro</h3>
            <p><b>Location:</b> Hyderabad</p>
            <p><b>Role:</b> Data Analyst</p>
            <a href="{{ url('/jobs') }}" class="company-btn">View Jobs</a>
        </div>

        <div class="company-card">
            <img src="{{ asset('images/hcl.png') }}" class="company-logo" alt="HCL">
            <h3>HCL</h3>
            <p><b>Location:</b> Lucknow</p>
            <p><b>Role:</b> System Engineer</p>
            <a href="{{ url('/jobs') }}" class="company-btn">View Jobs</a>
        </div>

    </div>

</section>
@endsection