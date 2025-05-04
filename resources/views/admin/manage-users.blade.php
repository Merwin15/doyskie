<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto py-8">

    <!-- Back button -->
    <a href="{{ route('admin.dashboard') }}" class="inline-block mb-4">
    <img src="{{ asset('https://www.iconpacks.net/icons/2/free-back-arrow-icon-3095-thumb.png') }}" alt="Back to Dashboard" class="h-10">
    </a>
    
        <h1 class="text-3xl font-bold mb-4">Manage Users</h1>

        <!-- Total Users Count -->
        <div class="mb-4">
            <p>Total number of users: <strong>{{ $totalUsers }}</strong></p>
        </div>

        <!-- Add User Button -->
        <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm mb-4 inline-block">Add User</a>

        <!-- Users Table -->
        <table class="min-w-full table-auto bg-white shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">User ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500">Edit</a> | 
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
