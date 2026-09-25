<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // VIEW TASKS: list everything
    public function index()
    {
        $tasks = Task::orderBy('due_date')->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show the "Add Task" form
    public function create()
    {
        return view('tasks.create');
    }

    // ADD TASK: save the form data
    public function store(Request $request)
    {
        $request->validate([
            'task_name'   => 'required|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:Pending,Completed',
            'due_date'    => 'nullable|date',
        ]);

        Task::create($request->only(['task_name', 'description', 'status', 'due_date']));

        return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
    }

    // Optional single-task page — just send them back to the list
    public function show(Task $task)
    {
        return redirect()->route('tasks.index');
    }

    // Show the "Edit Task" form (with old data)
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // EDIT TASK: save changes
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name'   => 'required|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:Pending,Completed',
            'due_date'    => 'nullable|date',
        ]);

        $task->update($request->only(['task_name', 'description', 'status', 'due_date']));

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // DELETE TASK
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }

    // UPDATE STATUS: toggle Pending <-> Completed
    public function updateStatus(Task $task)
    {
        $task->update([
            'status' => $task->status === 'Pending' ? 'Completed' : 'Pending',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Status updated!');
    }
}