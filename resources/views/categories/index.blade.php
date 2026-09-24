<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: white;
        }

        .container {
            width: 650px;
            margin: 60px auto;
            padding: 25px;
            background: #1e293b;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
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

        .category-card {
            padding: 15px;
            margin-bottom: 15px;
            background: #0f172a;
            border-radius: 8px;
            overflow-wrap: break-word;
        }

        .category-card h2 {
            margin-top: 0;
        }

        .category-card a {
            color: #60a5fa;
        }

        .actions {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Categories</h1>

        @if (session()->has('message'))
            <p>{{ session('message') }}</p>
        @endif

        <a class="button" href="/categories/create">create category</a>

        @if ($categories->isEmpty())

            <p>no categories found</p>
        @else
            @foreach ($categories as $category)
                <div class="category-card">

                    <h2>{{ $category->name }}</h2>

                    <div class="actions">
                        <a class="button" href="/categories/{{ $category->id }}/edit">edit</a>

                        <form method="POST" action="/categories/{{ $category->id }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="button" type="submit">delete</button>
                        </form>

                    </div>
                </div>
            @endforeach

        @endif

    </div>
</body>

</html>
