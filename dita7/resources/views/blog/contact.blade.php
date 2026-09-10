@extends('blog.master')
@section('title', 'Contact')
@section('content')
    <h1>Contact Us</h1>
    <p>If you have any questions or would like to get in touch, please fill out the form below:</p>
    <form action="#" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
    <h2>Our Location</h2>
    <p>123 Main Street, Anytown, USA</p>
    <h2>Phone</h2>
    <p>(123) 456-7890</p>
    <h2>Email</h2>
    <p>
        <a href="mailto:info@myblog.com">info@myblog.com</a>
    </p>
@endsection