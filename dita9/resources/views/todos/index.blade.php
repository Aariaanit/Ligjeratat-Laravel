@extends('todos.layout')
@section('content')
    <h1>Detyrat</h1>
    <p>Të hapura: {{ $open_todos }} · Të përfunduara: {{ $completed_todos }}</p>
    @if($todos->isNotEmpty())
        <div class="table-wrap">
            <table>
                <thead><tr><th>Nr.</th><th>Titulli</th><th>Statusi</th><th>Veprimet</th></tr></thead>
                <tbody>
                @foreach($todos as $todo)
                    <tr>
                        <td>{{ $todo->id }}</td>
                        <td><a href="{{ route('todos.show', $todo) }}">{{ $todo->title }}</a></td>
                        <td><span class="badge {{ $todo->completed ? 'done' : '' }}">{{ $todo->completed ? 'E përfunduar' : 'E hapur' }}</span></td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('todos.edit', $todo) }}">Ndrysho</a>
                                <form action="{{ route('todos.destroy', $todo) }}" method="POST" onsubmit="return confirm('Dëshiron ta fshish këtë detyrë?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="danger" type="submit">Fshi</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="alert">Lista e detyrave është e zbrazët.</p>
    @endif
@endsection
