@extends('layouts.app')

@section('content')
    <div class="page-heading"><h1>Create Todo</h1></div>

    <div class="card"><div class="card-body">
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            @include('todos.partials.form', ['todo' => null, 'submitLabel' => 'Create Todo'])
        </form>
    </div></div>
@endsection
