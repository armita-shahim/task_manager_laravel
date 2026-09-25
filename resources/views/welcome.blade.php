<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: white;
            text-align: center;
        }

        .container {
            width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: #1e293b;
            border-radius: 10px;
        }

        .button {
            display: inline-block;
            padding: 8px 20px;
            margin: 5px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>task manager</h1>
        <p>welcome, you can manage your tasks here</p>

        <a class="button" href="/login">login</a>
        <a class="button" href="/register">register</a>

    </div>

</body>

</html>
