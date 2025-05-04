<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Library System - User Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="{{ asset('js/script.js') }}"></script>
  <style>
    .book-card {
      transition: transform 0.3s ease;
    }
    .book-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body class="bg-gray-100">
  
@include('routes.navbar')

<main class="p-8 max-w-7xl mx-auto">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Welcome to our Library</h1>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <section class="py-6 px-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-700 border-b pb-2">Available Books</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @forelse ($books as $book)
                <a href="{{ route('book.details', $book->id) }}" class="book-card block">
                    <div class="bg-[#BF9264] p-3 rounded-lg shadow hover:shadow-lg">
                        <div class="h-64 mb-2 overflow-hidden rounded">
                            <img src="{{ asset('images/' . ($book->image ?? 'default-book.jpg')) }}" 
                                alt="{{ $book->title }}" 
                                class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                        </div>
                        <h3 class="font-bold text-lg text-white truncate">{{ $book->title }}</h3>
                        <p class="text-sm text-gray-200">{{ $book->author }}</p>
                        <div class="mt-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
                                {{ $book->genre }}
                            </span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-5 text-center py-10">
                    <p class="text-gray-500 text-lg">No books available at the moment.</p>
                </div>
            @endforelse
        </div>
    </section>
</main>

<footer class="bg-gray-800 text-white p-6 mt-10">
    <div class="max-w-7xl mx-auto">
        <p class="text-center">&copy; {{ date('Y') }} Library Management System. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
