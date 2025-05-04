<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Your Borrowed Books</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="js/script.js"></script>
</head>
<body>

@include('routes.navbar')

<main class="p-8">
    <h1 class="text-2xl font-bold mb-6">Borrowed Books</h1>

    <!-- Display Cart Items -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach (session('cart', []) as $book_id)
            @php
                $book = $books[$book_id] ?? null;
            @endphp
            @if ($book)
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="font-bold text-lg">{{ $book['title'] }}</h3>
                    <p class="text-sm text-gray-600">{{ $book['author'] }}</p>

                    <!-- Form to remove from cart -->
                    <form action="{{ route('cart.remove') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="remove_book_id" value="{{ $book_id }}">
                        <button type="submit" class="text-sm text-red-500 hover:underline">Remove</button>
                    </form>

                    <!-- Example of Pending Request (if applicable) -->
                    <p class="text-xs text-yellow-600 mt-1 italic">Pending Request</p>
                </div>
            @endif
        @endforeach
    </div>

    @if (empty(session('cart')))
        <p>No borrowed books yet.</p>
    @endif
</main>

</body>
</html>
