@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <h1>Todos</h1>
        <a class="button button-primary" href="{{ route('todos.create') }}">Add Todo</a>
    </div>

    <div class="card">
        @forelse ($todos as $todo)
            @if ($loop->first)
                <div class="table-wrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Due date</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
            @endif
                            <tr>
                                <td><strong>{{ $todo->title }}</strong></td>
                                <td class="description muted">{{ $todo->description ?: '—' }}</td>
                                <td><span class="badge badge-{{ $todo->status }}">{{ ucfirst($todo->status) }}</span></td>
                                <td>{{ $todo->due_date?->format('M j, Y') ?? '—' }}</td>
                                <td>{{ $todo->created_at->format('M j, Y') }}</td>
                                <td>
                                    <div class="actions">
                                        <a class="button button-secondary button-small" href="{{ route('todos.show', $todo) }}">View</a>
                                        <a class="button button-secondary button-small" href="{{ route('todos.edit', $todo) }}">Edit</a>
                                        <form class="inline-form" action="{{ route('todos.destroy', $todo) }}" method="POST" onsubmit="return confirm('Delete this todo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button button-danger button-small" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
            @if ($loop->last)
                        </tbody>
                    </table>
                </div>
            @endif
        @empty
            <div class="empty">
                <h2>No todos yet</h2>
                <p class="muted">Create your first todo to keep track of what matters.</p>
                <a class="button button-primary" href="{{ route('todos.create') }}">Add your first Todo</a>
            </div>
        @endforelse
    </div>
@endsection
