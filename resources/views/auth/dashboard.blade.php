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

    <a href="{{ route('posts.index') }}">
        <button type="button">View My Posts</button>
    </a>

    <form method="POST" action="/logout" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <hr>

    <h2>All Posts</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Posted By</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->body, 50) }}</td>
                    <td>{{ $post->user->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No posts have been created yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>