<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Smart Placement System')</title>

    @vite('resources/css/style.css')
</head>

<body class="@yield('body-class')">

<header>
    <h2 class="logo">Smart Placement System</h2>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('jobs') }}">Jobs</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </nav>
</header>

<!-- 🔥 ONLY ADD WRAPPER (NO REMOVE) -->
<div class="page-wrapper">

    <div class="content">
        @yield('content')
    </div>

    <!-- FOOTER (UNCHANGED) -->
    <footer class="footer">

      <div class="footer-container">

        <div class="footer-box">
          <h3>Smart Placement System</h3>
          <p>
            A platform to connect students with top company and help them find the best career opportunities.
          </p>
        </div>

        <div class="footer-box">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('jobs') }}">Jobs</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </div>

        <div class="footer-box">
          <h3>Contact</h3>
          <p>Email: support@placement.com</p>
          <p>Phone: +91 9876543210</p>
          <p>Location: India</p>
        </div>

      </div>

      <div class="footer-bottom">
        <p>© 2026 Smart Placement Portal | All Rights Reserved</p>
      </div>

    </footer>

</div>
<!-- 🔥 WRAPPER END -->

@vite('resources/js/script.js')

</body>
</html>