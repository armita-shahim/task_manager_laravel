<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Task Manager')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: white;
        }

        .container {
            width: 450px;
            margin: 60px auto;
            padding: 25px;
            background: #1e293b;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 2px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #334155;
        }

        textarea {
            height: 100px;
        }

        .button {
            display: inline-block;
            padding: 8px 20px;
            margin-bottom: 20px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .buttons {
            text-align: center;
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }

        a {
            color: #60a5fa;
        }

        .task-card,
        .category-card,
        .user-card,
        .assign-card {
            padding: 15px;
            margin-bottom: 15px;
            background: #0f172a;
            border-radius: 8px;
            overflow-wrap: break-word;
        }

        .task-card h2,
        .category-card h2,
        .user-card h2 {
            margin-top: 0;
        }

        .actions {
            margin-top: 15px;
            text-align: center;
        }

        .user-checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .user-checkbox input {
            width: auto;
            margin: 0;
        }

        nav {
            padding: 15px;
            background: #1e293b;
            text-align: center;
        }

        nav a {
            margin: 0 10px;
            color: #60a5fa;
            text-decoration: none;
        }

        nav button {
            padding: 8px 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
        }

        nav button:hover {
            background: #1d4ed8;
        }

        svg {
            width: 14px !important;
            height: 14px !important;
        }
    </style>
</head>

<body>

    @auth
        @include('components.nav')
    @endauth

    @if (session()->has('message'))
        <p style="text-align: center;">{{ session('message') }}</p>
    @endif

    @yield('content')

</body>

</html>
