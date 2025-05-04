<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Books</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto py-8">

    <!-- Back button -->
    <a href="{{ route('admin.dashboard') }}" class="inline-block mb-4">
    <img src="{{ asset('https://www.iconpacks.net/icons/2/free-back-arrow-icon-3095-thumb.png') }}" alt="Back to Dashboard" class="h-10">
    </a>

        <h1 class="text-3xl font-bold mb-4">Total Books</h1>

    <!-- Total books count -->
    <div class="mb-4">
        <p>Total number of books: <strong>{{ $totalBooks ?? 'Not set' }}</strong></p>
    </div>

    <!-- Add Book Button -->
    <a href="{{ route('admin.books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm mb-4 inline-block">Add Book</a>

    
        <!-- Books Table -->
        <table class="min-w-full table-auto bg-white shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Book ID</th>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Author</th>
                    <th class="py-2 px-4 border-b">Genre</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $book['book_id'] }}</td>
                    <td class="py-2 px-4 border-b">{{ $book['title'] }}</td>
                    <td class="py-2 px-4 border-b">{{ $book['author'] }}</td>
                    <td class="py-2 px-4 border-b">{{ $book['genre'] }}</td>
                    <td class="py-2 px-4 border-b">{{ isset($book['available']) && $book['available'] ? 'Available' : 'Unavailable' }}</td>
                    
                    <td class="py-2 px-4 border-b">
                    <a href="{{ route('admin.books.edit', $book['book_id']) }}" class="text-blue-500">Edit</a> | 
                    <form action="{{ route('admin.books.delete', $book['book_id']) }}" method="POST" style="display:inline;">
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
