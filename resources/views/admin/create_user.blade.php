<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>
    
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Create User Account</h1>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div>
    <label>Name:</label>
    <input type="text" name="name">
        </div>
        <br>
        <div>
            <label>Email:</label>
            <input type="email" name="email">
        </div>
        <br>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
        </div>
        <br>
        <div>
            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation">
        </div>
        <br>
        <button type="submit">Register</button>

    </form>
</body>
</html>