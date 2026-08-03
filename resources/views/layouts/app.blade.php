<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' · Todo' : 'Todo' }}</title>
    <style>
        :root { color-scheme: light; font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; color: #1e293b; background: #f8fafc; }
        * { box-sizing: border-box; }
        body { margin: 0; }
        a { color: inherit; text-decoration: none; }
        .nav { background: #0f172a; color: #fff; }
        .nav-inner, .container { width: min(1120px, calc(100% - 2rem)); margin: 0 auto; }
        .nav-inner { min-height: 4.25rem; display: flex; align-items: center; justify-content: space-between; gap: 1rem; }
        .brand { font-weight: 800; letter-spacing: -.02em; font-size: 1.2rem; }
        .nav-link { color: #cbd5e1; font-size: .95rem; }
        .nav-link:hover { color: #fff; }
        main { padding: 2.5rem 0; }
        .page-heading { display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1.5rem; }
        h1 { margin: 0; font-size: clamp(1.65rem, 3vw, 2.1rem); letter-spacing: -.04em; }
        h2 { margin-top: 0; }
        .card { background: #fff; border: 1px solid #e2e8f0; border-radius: .85rem; box-shadow: 0 1px 2px rgb(15 23 42 / 4%); }
        .card-body { padding: 1.5rem; }
        .button { display: inline-flex; justify-content: center; align-items: center; gap: .35rem; border: 1px solid transparent; border-radius: .5rem; padding: .62rem .9rem; font: inherit; font-weight: 650; cursor: pointer; }
        .button-primary { color: #fff; background: #2563eb; }.button-primary:hover { background: #1d4ed8; }
        .button-secondary { background: #fff; color: #334155; border-color: #cbd5e1; }.button-secondary:hover { background: #f8fafc; }
        .button-danger { color: #b91c1c; background: #fff; border-color: #fecaca; }.button-danger:hover { background: #fef2f2; }
        .button-small { padding: .42rem .65rem; font-size: .875rem; }
        .alert { border-radius: .6rem; padding: .9rem 1rem; margin-bottom: 1.25rem; }.alert-success { color: #166534; background: #f0fdf4; border: 1px solid #bbf7d0; }.alert-error { color: #991b1b; background: #fef2f2; border: 1px solid #fecaca; }
        .errors { margin: 0; padding-left: 1.25rem; }.errors li + li { margin-top: .25rem; }
        .form-group { margin-bottom: 1.1rem; }.form-label { display: block; font-size: .9rem; font-weight: 650; margin-bottom: .42rem; color: #334155; }
        .form-input, .form-select, .form-textarea { display: block; width: 100%; border: 1px solid #cbd5e1; border-radius: .5rem; padding: .68rem .75rem; color: #0f172a; font: inherit; background: #fff; }.form-textarea { min-height: 8rem; resize: vertical; }.form-input:focus, .form-select:focus, .form-textarea:focus { outline: 3px solid #bfdbfe; border-color: #2563eb; }
        .field-error { color: #b91c1c; margin: .35rem 0 0; font-size: .85rem; }.form-actions { display: flex; flex-wrap: wrap; gap: .65rem; margin-top: 1.5rem; }
        .table-wrap { overflow-x: auto; }.table { width: 100%; border-collapse: collapse; min-width: 720px; }.table th, .table td { padding: 1rem; text-align: left; border-bottom: 1px solid #e2e8f0; vertical-align: top; }.table th { color: #64748b; font-size: .75rem; text-transform: uppercase; letter-spacing: .06em; }.table tr:last-child td { border-bottom: 0; }
        .muted { color: #64748b; }.description { max-width: 25rem; white-space: pre-line; }.badge { display: inline-flex; border-radius: 999px; padding: .25rem .6rem; font-size: .78rem; font-weight: 700; }.badge-pending { color: #92400e; background: #fef3c7; }.badge-completed { color: #166534; background: #dcfce7; }
        .actions { display: flex; flex-wrap: wrap; gap: .45rem; }.inline-form { display: inline; }.empty { padding: 3.5rem 1.5rem; text-align: center; }.empty p { margin: .45rem 0 1.25rem; }
        .details { display: grid; grid-template-columns: 10rem 1fr; gap: 1rem; }.details dt { color: #64748b; font-weight: 650; }.details dd { margin: 0; white-space: pre-line; }
        @media (max-width: 640px) { main { padding: 1.5rem 0; }.page-heading { align-items: flex-start; flex-direction: column; }.page-heading .button { width: 100%; }.details { grid-template-columns: 1fr; gap: .3rem; }.details dd { margin-bottom: .85rem; }.card-body { padding: 1.15rem; } }
    </style>
</head>
<body>
    <header class="nav">
        <div class="nav-inner">
            <a class="brand" href="{{ route('todos.index') }}">Todo</a>
            <a class="nav-link" href="{{ route('todos.index') }}">All Todos</a>
        </div>
    </header>

    <main>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="status">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error" role="alert">
                    <strong>Please correct the following errors:</strong>
                    <ul class="errors">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</body>
</html>
