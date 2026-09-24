<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: white;
        }

        .container {
            width: 400px;
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

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border-radius: 5px;
            margin-bottom: 15px;
            border: 1px solid #334155;
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
    </style>
</head>

<body>

    <h1>Edit Category</h1>
    <div class="container">
        <form method="POST" action="/categories/{{ $category->id }}">
            @csrf
            @method('PUT')

            <div>
                <label for="name">name</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}">

                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="buttons">
                <button class="button" type="submit">update category</button>
            </div>
        </form>
        <div class="link">
            <a href="/categories">Back to categories</a>
        </div>

    </div>

</body>

</html>
