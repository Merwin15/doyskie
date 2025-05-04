<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">Add New Book</h1>

    <form action="{{ route('admin.books.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="title" class="block mb-2 font-bold">Title</label>
            <input type="text" name="title" id="title" class="border border-gray-300 p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="author" class="block mb-2 font-bold">Author</label>
            <input type="text" name="author" id="author" class="border border-gray-300 p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="genre" class="block mb-2 font-bold">Genre</label>
            <input type="text" name="genre" id="genre" class="border border-gray-300 p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-2 font-bold">Description</label>
            <input type="text" name="description" id="description" class="border border-gray-300 p-2 w-full" required>
        </div>
        
    <!-- Uploads the Image -->
        <div class="mb-4">
            <label class="block text-gray-700">Book Cover Image</label>
            <input type="file" name="image" class="mt-1 block w-full">
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
            <a href="{{ route('admin.total-books') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
