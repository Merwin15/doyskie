<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">Edit Book</h1>

    <!-- Edit Book Form -->
    <form action="{{ route('admin.books.update', $book['book_id']) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book['title']) }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="author" class="block text-sm font-semibold">Author</label>
            <input type="text" id="author" name="author" value="{{ old('author', $book['author']) }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="genre" class="block text-sm font-semibold">Genre</label>
            <input type="text" id="genre" name="genre" value="{{ old('genre', $book['genre']) }}" class="w-full px-4 py-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Book</button>
    </form>
</div>

</body>
</html>
