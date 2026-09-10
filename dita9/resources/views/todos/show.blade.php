@extends('todos.layout')
@section('title', $todo->title)
@section('content')
    <h1>{{ $todo->title }}</h1>
    <p><span class="badge {{ $todo->completed ? 'done' : '' }}">{{ $todo->completed ? 'E përfunduar' : 'E hapur' }}</span></p>
    <p class="description">{{ $todo->description ?: 'Nuk ka përshkrim.' }}</p>
    <div class="actions">
        <a class="button" href="{{ route('todos.edit', $todo) }}">Ndrysho</a>
        <a href="{{ route('todos.index') }}">Kthehu te lista</a>
    </div>
@endsection
