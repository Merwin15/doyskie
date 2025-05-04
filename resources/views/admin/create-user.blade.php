<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Add User</h1>

        <!-- Back Button -->
        <a href="{{ route('admin.manage-users') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Back to Users</a>

        <!-- Add User Form -->
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block">Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded" required>
            
            </div>
            <div class="mb-4">
                <label for="email" class="block">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded" required>
            
                <!-- Display an error message if the password is less than 6 characters -->
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            </div>
            
            <div class="mb-4">
                <label for="password_confirmation" class="block">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add User</button>
        </form>
    </div>

</body>
</html>
