<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
</head>
<body>

    <h1>All Users</h1>

    @if (session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('admin.users.index') }}">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search by name or email...">
        <button type="submit">Search</button>
    </form>
    <a href="{{ route('admin.users.create') }}">
        <button type="button">Add User</button>
    </a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}">
                            <button type="button">Edit</button>
                        </a>

                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $users->links() }}

</body>
</html>