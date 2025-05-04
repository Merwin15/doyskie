<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Bookmarked Books</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    .book-card {
      transition: transform 0.3s ease;
    }
    .book-card:hover {
      transform: translateY(-5px);
    }
  </style>
</head>
<body class="bg-gray-100">

@include('routes.navbar')

<main class="min-h-screen p-10 max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">My Bookmarked Books</h1>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($bookmarked_books as $book)
            <div class="book-card bg-white p-6 rounded-lg shadow-md">
                <div class="mb-4 h-48 overflow-hidden rounded">
                    <img src="{{ asset('images/' . ($book->image ?? 'default-book.jpg')) }}" 
                         alt="{{ $book->title }}" 
                         class="w-full h-full object-cover">
                </div>
                <h3 class="font-bold text-xl mb-2">{{ $book->title }}</h3>
                <p class="text-gray-600 text-sm mb-2">{{ $book->author }}</p>
                <p class="text-gray-500 text-xs mb-4">{{ $book->genre }}</p>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('book.details', $book->id) }}" 
                       class="text-blue-500 hover:text-blue-700 text-sm">
                        View Details
                    </a>
                    
                    <!-- Form to remove from bookmarks -->
                    <form action="{{ route('book.removeBookmark', $book->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 flex items-center">
                            <i class="fas fa-bookmark mr-1"></i>
                            <span>Remove</span>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-4 text-center p-10 bg-white rounded-lg shadow-md">
                <i class="fas fa-bookmark text-gray-300 text-5xl mb-4"></i>
                <p class="text-gray-500">You haven't bookmarked any books yet.</p>
                <a href="{{ route('user.dashboard') }}" 
                   class="inline-block mt-4 px-4 py-2 bg-[#BF9264] text-white rounded hover:bg-[#A67F43]">
                    Browse Books
                </a>
            </div>
        @endforelse
    </div>
</main>

<footer class="bg-gray-800 text-white p-6 mt-10">
    <div class="max-w-7xl mx-auto">
        <p class="text-center">&copy; {{ date('Y') }} Library Management System. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
