@extends('layouts.app')

@section('content')
    <div class="page-heading"><h1>Edit Todo</h1></div>

    <div class="card"><div class="card-body">
        <form action="{{ route('todos.update', $todo) }}" method="POST">
            @csrf
            @method('PUT')
            @include('todos.partials.form', ['todo' => $todo, 'submitLabel' => 'Update Todo'])
        </form>
    </div></div>
@endsection
