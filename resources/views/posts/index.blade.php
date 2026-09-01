<!DOCTYPE html>
<html>
<head>
    <title>My Posts</title>
</head>
<body>

    <h1>My Posts</h1>

    @if (session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('posts.create') }}">
        <button type="button">Add New Post</button>
    </a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->body, 50) }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post) }}">
                            <button type="button">Edit</button>
                        </a>

                        <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">You haven't created any posts yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>