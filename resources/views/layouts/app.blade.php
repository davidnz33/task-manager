<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Tasks — Task Management</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- ===== NAVBAR ===== --}}
    <header class="topbar">
        <div class="topbar-content">
            <a href="{{ route('tasks.index') }}" class="logo">
                <span class="logo-icon">✓</span>
                <span class="logo-text">
                    <strong>My Tasks</strong>
                    <small>Stay organized</small>
                </span>
            </a>

            <nav class="navigation">
                <a href="{{ route('tasks.index') }}">Dashboard</a>
                <a href="{{ route('tasks.create') }}" class="btn btn-nav">+ Create Task</a>
            </nav>
        </div>
    </header>

    {{-- ===== MAIN CONTENT (centered) ===== --}}
    <main class="main-area">

        <div class="page-heading">
            <p class="eyebrow">Task Management</p>
            <h1>Keep track of your work</h1>
            <p class="page-subtitle">Organize your tasks, meet your deadlines, and stay productive.</p>
        </div>

        {{-- Success message --}}
        @if(session('success'))
            <div class="message success-message">
                <span class="message-icon">✓</span>
                <div>
                    <strong>Success!</strong>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        {{-- Error messages --}}
        @if($errors->any())
            <div class="message error-message">
                <span class="message-icon">!</span>
                <div>
                    <strong>Please check the following:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <section class="content-card">
            @yield('content')
        </section>

    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="footer">
        <p>&copy; {{ date('Y') }} My Tasks &middot; Manage your day, one task at a time.</p>
    </footer>

</body>
</html>