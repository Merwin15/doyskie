<!-- Genre Books Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ ucfirst($genre) }} Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    @include('routes.navbar')

    <main class="p-8">
        <h1 class="text-2xl font-semibold mb-4">{{ ucfirst($genre) }} Books</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-2">
            @if($filtered_books)
                @foreach($filtered_books as $book)
                    <a href="{{ route('book.details', ['book_id' => $book['book_id']]) }}" class="block">
                        <div class="bg-[#BF9264] p-2 rounded shadow w-48 mx-auto hover:shadow-lg transition">
                            <img src="{{ asset('images/' . $book['image']) }}" alt="{{ $book['title'] }}" class="w-40 h-61 object-cover rounded mb-2 mx-auto">
                            <h3 class="font-bold text-lg text-white">{{ $book['title'] }}</h3>
                            <p class="text-sm text-gray-300">{{ $book['author'] }}</p>
                        </div>
                    </a>
                @endforeach
            @else
                <p>No books found in this category.</p>
            @endif
        </div>
    </main>

</body>
</html>
