@extends('todos.layout')
@section('title', 'Shto detyrë')
@section('content')
    <h1>Shto detyrë</h1>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        @include('todos.form', ['submitLabel' => 'Krijo detyrën'])
    </form>
@endsection
