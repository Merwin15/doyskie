<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show($genre)
    {
        $books = include(app_path('Data/books.php'));

        // Filter the books by the genre
        $filtered_books = array_filter($books, function ($book) use ($genre) {
            return isset($book['genre']) && $book['genre'] === $genre;
        });

        return view('user.genre-books', compact('filtered_books', 'genre'));
    }
}
