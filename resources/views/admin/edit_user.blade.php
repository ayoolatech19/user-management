<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>

    <h2>Edit User Profile</h2>

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}">

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}">
        <button type="submit">Update</button>
    </form>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('admin.users.index') }}">Cancel</a>

</body>
</html>