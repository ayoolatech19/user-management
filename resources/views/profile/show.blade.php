<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
</head>
<body>

    <div class="profile-bar">
        <h2>{{ $user->name }}</h2>
        <p>Email: {{ $user->email }}</p>
        <p>Joined: {{ $user->created_at->format('d M Y') }}</p>

        <a href="{{ route('profile.edit') }}">
            <button type="button">Edit Profile</button>
        </a>

        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?');" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Account</button>
        </form>
    </div>

    <a href="{{ route('dashboard') }}">Back to Dashboard</a>

</body>
</html>