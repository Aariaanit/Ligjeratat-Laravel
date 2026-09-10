<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        return view('todos.index', [
            'todos' => Todo::latest('id')->get(),
            'open_todos' => Todo::where('completed', false)->count(),
            'completed_todos' => Todo::where('completed', true)->count(),
        ]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        Todo::create($this->validatedData($request));

        return redirect()->route('todos.index')->with('status', 'Detyra u krijua me sukses.');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update($this->validatedData($request));

        return redirect()->route('todos.index')->with('status', 'Detyra u ndryshua me sukses.');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')->with('status', 'Detyra u fshi me sukses.');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:10000'],
            'completed' => ['sometimes', 'boolean'],
        ]);
        $data['completed'] = $request->boolean('completed');

        return $data;
    }
}
