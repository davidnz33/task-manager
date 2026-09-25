@extends('layouts.app')

@section('content')

    <div class="form-header">
        <span class="section-label">TASK SETTINGS</span>
        <h1>Edit Task</h1>
        <p>Update the details of your task below.</p>
    </div>

    <form action="{{ route('tasks.update', $task) }}"
          method="POST"
          class="task-form">

        @csrf
        @method('PUT')

        <div class="form-group">

            <label for="task_name">
                Task Name <span>*</span>
            </label>

            <input
                type="text"
                name="task_name"
                id="task_name"
                value="{{ old('task_name', $task->task_name) }}"
                placeholder="Enter task name"
            >

        </div>

        <div class="form-group">

            <label for="description">
                Description
            </label>

            <textarea
                name="description"
                id="description"
                rows="4"
                placeholder="Add some details about this task..."
            >{{ old('description', $task->description) }}</textarea>

        </div>

        <div class="form-row">

            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select name="status" id="status">

                    <option value="Pending"
                        @selected(old('status', $task->status) === 'Pending')>
                        Pending
                    </option>

                    <option value="Completed"
                        @selected(old('status', $task->status) === 'Completed')>
                        Completed
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    name="due_date"
                    id="due_date"
                    value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}"
                >

            </div>

        </div>

        <div class="form-actions">

            <button type="submit" class="btn btn-primary">
                Update Task
            </button>

            <a href="{{ route('tasks.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </div>

    </form>

@endsection
