<!-- Search Results Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    @include('routes.navbar')

    <main class="p-8">
        <h1 class="text-2xl font-semibold mb-4">*Introduction here*</h1>
        <section class="py-6 px-4">
            <h2 class="text-2xl font-bold mb-4">Search Results for "{{ $search }}"</h2>

            @if($results)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($results as $book)
                        <a href="{{ route('book.details', ['book_id' => $book['book_id']]) }}">
                            <div class="bg-[#BF9264] p-2 rounded shadow w-48 mx-auto hover:shadow-lg transition">
                                <img src="{{ asset('images/' . $book['image']) }}" alt="{{ $book['title'] }}" class="w-40 h-61 object-cover rounded mb-2 mx-auto">
                                <h3 class="font-bold text-lg text-white">{{ $book['title'] }}</h3>
                                <p class="text-sm text-gray-300">{{ $book['author'] }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p>No books found matching your search criteria.</p>
            @endif
        </section>
    </main>

</body>
</html>
