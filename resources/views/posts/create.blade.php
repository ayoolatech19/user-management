<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>

    <h2>Create New Post</h2>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title') }}">

        <br><br>

        <label>Body:</label>
        <br>
        <textarea name="body" rows="6" cols="50">{{ old('body') }}</textarea>

        <br><br>

        <button type="submit">Create Post</button>
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