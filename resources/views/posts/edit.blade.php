<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>

    <h2>Edit Post</h2>

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}">

        <br><br>

        <label>Body:</label>
        <br>
        <textarea name="body" rows="6" cols="50">{{ old('body', $post->body) }}</textarea>

        <br><br>

        <button type="submit">Update Post</button>
    </form>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('posts.index') }}">Cancel</a>

</body>
</html>