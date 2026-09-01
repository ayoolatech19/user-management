<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->name }}'s Posts</title>
</head>
<body>

    <h1>Posts by {{ $user->name }}</h1>
    

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->body, 50) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">This user hasn't created any posts yet.</td>
                </tr>
                
            @endforelse
        </tbody>
           <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Remove this post?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove post</button>
                        </form>


    </table>

    <a href="{{ route('admin.users.index') }}">Back to Users</a>

</body>
</html>