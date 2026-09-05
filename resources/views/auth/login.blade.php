<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="/login">
        @csrf

        <label>Email:</label>
        <input type="email" name="email" autocomplete="off">
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" autocomplete="off">
        <br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>