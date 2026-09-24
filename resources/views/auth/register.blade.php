<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: white;
        }

        .container {
            width: 350px;
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
            margin-bottom: 20px;
            border: 1px solid #334155;
        }

        button {
            padding: 8px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background: #1d4ed8;
        }

        .buttons {
            text-align: center;
        }

        .error {
            color: #ff6b6b;
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
        <h1>Register</h1>
        <form method="POST" action="/register">
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
                <input type="text" id="email" name="email">

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
            <div class="buttons">
                <button type="submit">register</button>
            </div>
        </form>
        <div class="link">
            Already have an account?
            <a href="/login">login here</a>
        </div>

    </div>

</body>

</html>
