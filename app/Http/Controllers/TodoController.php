<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function index(): View
    {
        $todos = Todo::latest()->get();

        return view('todos.index', compact('todos'));
    }

    public function create(): View
    {
        return view('todos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Todo::create($this->validatedData($request));

        return to_route('todos.index')->with('success', 'Todo created successfully.');
    }

    public function show(Todo $todo): View
    {
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo): View
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo): RedirectResponse
    {
        $todo->update($this->validatedData($request));

        return to_route('todos.index')->with('success', 'Todo updated successfully.');
    }

    public function destroy(Todo $todo): RedirectResponse
    {
        $todo->delete();

        return to_route('todos.index')->with('success', 'Todo deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:pending,completed'],
            'due_date' => ['nullable', 'date'],
        ]);
    }
}
