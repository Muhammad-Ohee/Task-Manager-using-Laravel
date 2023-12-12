<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Task List</h1>

        <ul>
            @forelse($tasks as $task)
                <li>
                    <strong>{{ $task->title }}</strong>
                    <p>{{ $task->description }}</p>
                    <p>Status: {{ $task->status }}</p>
                    <a href="{{ route('tasks.show', $task->id) }}">View Details</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                    </form>
                </li>
            @empty
                <p>No tasks available.</p>
            @endforelse
        </ul>
    </div>
@endsection
