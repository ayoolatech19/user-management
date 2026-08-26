<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if (session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="/login">
        @csrf

        <label>Email:</label>
        <input type="email" name="email">
        <br><br>

        <label>Password:</label>
        <input type="password" name="password">
        <br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>