<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
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

        input,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border-radius: 5px;
            margin-bottom: 20px;
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
    <div class="container">
        <h1>Create User</h1>

        <form method="POST" action="/users">

            @csrf

            <div>
                <label for="username">username</label>
                <input type="text" id="username" name="username">

                @error('username')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email">email</label>
                <input type="email" id="email" name="email">

                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password">password</label>
                <input type="password" id="password" name="password">

                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation">confirm password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <div>
                <label for="role">role</label>

                <select id="role" name="role">
                    <option value="member">member</option>
                    <option value="admin">admin</option>
                </select>

                @error('role')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="buttons">
                <button class="button" type="submit">create user</button>
            </div>

        </form>
        <div class="link">
            <a href="/users">Back to users</a>
        </div>
    </div>
</body>

</html>
