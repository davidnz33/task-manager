@extends('layouts.app')

@section('content')

    <div class="form-header">
        <span class="section-label">NEW TASK</span>
        <h1>Add New Task</h1>
        <p>Create a task and keep your work organized.</p>
    </div>

    <form action="{{ route('tasks.store') }}" method="POST" class="task-form">
        @csrf

        <div class="form-group">
            <label for="task_name">Task Name <span>*</span></label>
            <input
                type="text"
                name="task_name"
                id="task_name"
                value="{{ old('task_name') }}"
                placeholder="Enter task name"
            >
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea
                name="description"
                id="description"
                rows="4"
                placeholder="Add some details about this task..."
            >{{ old('description') }}</textarea>
        </div>

        <div class="form-row">

            <div class="form-group">
                <label for="status">Status</label>

                <select name="status" id="status">
                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>

                <input
                    type="date"
                    name="due_date"
                    id="due_date"
                    value="{{ old('due_date') }}"
                >
            </div>

        </div>

        <div class="form-actions">

            <button type="submit" class="btn btn-primary">
                Save Task
            </button>

            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                Cancel
            </a>

        </div>

    </form>

@endsection
