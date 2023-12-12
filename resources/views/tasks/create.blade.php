<!-- resources/views/tasks/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" required>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea>

            <button type="submit">Create Task</button>
        </form>
    </div>
@endsection
