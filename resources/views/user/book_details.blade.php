<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $book->title }} - Book Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('routes.navbar')

    <main class="min-h-screen flex justify-center items-start p-5 bg-[#BF9264]">
        <div class="flex flex-col md:flex-row gap-10 bg-white p-8 rounded shadow w-full max-w-4xl">
            <!-- Book Cover -->
            <div class="flex-none text-center">
                <img src="{{ asset('images/' . ($book->image ?? 'default-book.jpg')) }}" 
                     alt="{{ $book->title }}" 
                     class="w-72 h-auto object-cover rounded mx-auto md:mx-0">
            </div>

            <!-- Book Details -->
            <div class="flex-1">
                <h2 class="text-2xl font-bold mb-2">{{ $book->title }}</h2>
                <p class="text-sm text-gray-600 mb-1">By <span class="font-medium">{{ $book->author }}</span></p>
                <p class="text-sm text-gray-500 italic mb-2">{{ $book->genre }}</p>
                <p class="text-gray-700 mb-4 text-sm max-h-40 overflow-y-auto">{{ $book->description }}</p>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <!-- Add to Bookmarks Button -->
                    <form action="{{ route('book.toggleBookmark', ['book_id' => $book->id]) }}" method="POST">
                        @csrf
                        <button type="submit" 
                            class="w-64 py-2 font-semibold rounded {{ $isBookmarked ? 'bg-gray-400 hover:bg-gray-500' : 'bg-[#BF9264] hover:bg-[#A67F43] text-white' }}">
                            {{ $isBookmarked ? 'Remove Bookmark' : 'Add to Bookmark' }}
                        </button>
                    </form>
                    
                    <!-- Add to Cart Button -->
                    @php
                        $in_cart = session()->has('cart') && in_array($book->id, session('cart', []));
                    @endphp
                    <form action="{{ route('book.addToCart', $book->id) }}" method="POST">
                        @csrf
                        <button 
                            type="submit" 
                            class="w-64 py-2 font-semibold rounded 
                            {{ $in_cart ? 'bg-gray-400 hover:bg-gray-500 text-white' : 'bg-green-500 hover:bg-green-600 text-white' }}"
                            {{ $in_cart ? 'disabled' : '' }}>
                            {{ $in_cart ? 'In Cart' : 'Borrow Book' }}
                        </button>
                    </form>

                    <!-- Back to Books -->
                    <div class="mt-6">
                        <a href="{{ route('user.dashboard') }}" class="text-[#BF9264] hover:underline">
                            <i class="fas fa-arrow-left mr-1"></i> Back to All Books
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
