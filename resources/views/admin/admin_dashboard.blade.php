<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <div class="p-8 text-center">
        <h1 class="text-2xl font-bold mb-48">Admin Dashboard</h1>

        <div class="space-x-6">
            <a href="{{ route('admin.total-books') }}" class="bg-[#754E1A] text-white px-20 py-12 rounded hover:bg-blue-700 text-lg">View Total Books</a>
            <a href="{{ route('admin.manage-users') }}" class="bg-[#754E1A] text-white px-20 py-12 rounded hover:bg-blue-700 text-lg">Manage Users</a>
        </div>
    </div>

        <form action="{{ route('logout') }}" method="POST" class="absolute top-4 right-4">
            @csrf
            <button type="submit" class="bg-black hover:bg-red-700 text-white text-sm py-1 px-3 rounded">Logout</button>
          </form>
</body>
</html>
