<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Edit User</h1>

        <!-- Back Button -->
        <a href="{{ route('admin.manage-users') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Back to Users</a>

        <!-- Edit User Form -->
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block">Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded" value="{{ old('email', $user->email) }}" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update User</button>
        </form>
    </div>

</body>
</html>
