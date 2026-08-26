<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <p>You are logged in.</p>

     <a href="{{ route('profile.show') }}">
            <button type="button">View Profile</button>
        </a>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>