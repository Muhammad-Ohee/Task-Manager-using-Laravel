<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(){
        // Fetch all tasks from the database and display them
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create(){
        // Show a form to create a new task
        return view('tasks.create');
    }

    public function store(Request $request){
        // Store a new task in the database
        //Task::create($request->all());
        //return redirect()->route('tasks.index');
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $task = new Task([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        // Attach the user ID to the task
        $task->user_id = Auth::id();

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit(Task $task){
        // Show a form to edit an existing task
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task){
        // Update an existing task in the database
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task){
        // Delete a task from the database
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

}
