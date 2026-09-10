<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Detyrat')</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f4f6fa; color: #202b40; font: 16px/1.5 system-ui, sans-serif; }
        main { max-width: 1000px; margin: 40px auto; padding: 24px; background: white; border-radius: 12px; }
        nav, .actions { display: flex; flex-wrap: wrap; gap: 12px; align-items: center; }
        nav { justify-content: space-between; margin-bottom: 24px; }
        a { color: #1749ad; }
        button, .button { display: inline-block; background: #1749ad; color: white; border: 0; padding: 9px 14px; border-radius: 6px; font: inherit; text-decoration: none; cursor: pointer; }
        button.danger { background: #b42318; }
        label { display: block; margin: 16px 0 6px; font-weight: 600; }
        input[type=text], textarea { width: 100%; padding: 10px; border: 1px solid #8b95a5; border-radius: 6px; font: inherit; }
        textarea { min-height: 130px; }
        .actions { margin-top: 20px; }
        .actions form { margin: 0; }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #dce1e9; overflow-wrap: anywhere; }
        .alert { padding: 12px; background: #e7f4eb; border-radius: 6px; }
        .errors { background: #ffebe9; }
        .badge { display: inline-block; padding: 3px 8px; border-radius: 4px; background: #e5ecfa; white-space: nowrap; }
        .done { background: #d9f0df; }
        .description { white-space: pre-wrap; overflow-wrap: anywhere; }
        h1 { overflow-wrap: anywhere; }
        @media (max-width: 600px) { main { margin: 12px; padding: 16px; } }
    </style>
</head>
<body>
<main>
    <nav aria-label="Navigimi kryesor">
        <a href="{{ route('todos.index') }}">Lista e detyrave</a>
        <a class="button" href="{{ route('todos.create') }}">Shto detyrë</a>
    </nav>
    @if(session('status'))
        <p class="alert" role="status">{{ session('status') }}</p>
    @endif
    @if($errors->any())
        <div class="alert errors" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('content')
</main>
</body>
</html>
