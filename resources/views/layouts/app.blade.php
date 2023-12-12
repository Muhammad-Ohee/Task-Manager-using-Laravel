<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
</head>
<body>

<div>
    <nav>
        <ul>
            <li><a href="{{ route('tasks.index') }}">Task List</a></li>
            <li><a href="{{ route('tasks.create') }}">Create Task</a></li>
        </ul>
    </nav>

    @yield('content')
</div>

</body>
</html>
