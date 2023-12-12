<!-- resources/views/tasks/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $task->title }}</h1>
        <p>Description: {{ $task->description }}</p>
        <p>Status: {{ $task->status }}</p>
        <!-- Add more details as needed -->
    </div>
@endsection
