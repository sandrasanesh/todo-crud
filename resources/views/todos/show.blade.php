@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <h1>{{ $todo->title }}</h1>
        <a class="button button-secondary" href="{{ route('todos.index') }}">Back to Todos</a>
    </div>

    <div class="card"><div class="card-body">
        <dl class="details">
            <dt>Description</dt>
            <dd>{{ $todo->description ?: 'No description provided.' }}</dd>

            <dt>Status</dt>
            <dd><span class="badge badge-{{ $todo->status }}">{{ ucfirst($todo->status) }}</span></dd>

            <dt>Due date</dt>
            <dd>{{ $todo->due_date?->format('F j, Y') ?? 'No due date' }}</dd>

            <dt>Created</dt>
            <dd>{{ $todo->created_at->format('F j, Y g:i A') }}</dd>

            <dt>Last updated</dt>
            <dd>{{ $todo->updated_at->format('F j, Y g:i A') }}</dd>
        </dl>

        <div class="form-actions">
            <a class="button button-primary" href="{{ route('todos.edit', $todo) }}">Edit</a>
            <form class="inline-form" action="{{ route('todos.destroy', $todo) }}" method="POST" onsubmit="return confirm('Delete this todo?');">
                @csrf
                @method('DELETE')
                <button class="button button-danger" type="submit">Delete</button>
            </form>
        </div>
    </div></div>
@endsection
