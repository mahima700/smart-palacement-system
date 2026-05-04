@extends('layouts.app')

@section('title', 'Contact')

@section('body-class', 'contact-page')

@section('content')

<section class="contact">

    <h1>Contact Us</h1>

    <p>If you have any questions regarding placements, feel free to contact us.</p>
    

    <div class="contact-container">

        <form method="POST" action="#">
            @csrf

            <label>Name</label>
            <input type="text" name="name" placeholder="Enter your name" required>

            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Message</label>
            <textarea name="message" placeholder="Write your message" required></textarea>

            <button type="submit">Send Message</button>

        </form>

    </div>

</section>

@endsection