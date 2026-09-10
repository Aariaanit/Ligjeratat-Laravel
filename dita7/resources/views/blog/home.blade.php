@extends('blog.master')
@section('title', 'Home Page')
@section('content')
    <h1>Welcome to My Blog</h1>
    <p>This is the home page of my blog. Here you will find the latest posts and updates.</p>
    <h2>Latest Posts</h2>
    <ul>
        <li><a href="#">Post 1: Introduction to Laravel</a></li>
        <li><a href="#">Post 2: Blade Templating Engine</a></li>
        <li><a href="#">Post 3: Eloquent ORM Basics</a></li>
    </ul>
    <div>
        <h2>About Me</h2>
        <p>Hi, I'm John Doe, a web developer and blogger. I love sharing my knowledge about Laravel and web development.</p>
    </div>
@endsection