@extends('todos.layout')
@section('title', 'Ndrysho detyrën')
@section('content')
    <h1>Ndrysho detyrën</h1>
    <form action="{{ route('todos.update', $todo) }}" method="POST">
        @csrf
        @method('PUT')
        @include('todos.form', ['submitLabel' => 'Ruaj ndryshimet'])
    </form>
@endsection
