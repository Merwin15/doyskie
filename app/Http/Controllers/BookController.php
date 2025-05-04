<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display all books in the user dashboard.
     */
    public function index()
    {
        $books = Book::where('available', true)->get();
        return view('user.user_dashboard', compact('books'));
    }

    /**
     * Display book details and check if it's bookmarked
     */
    public function show($book_id)
    {
        $book = Book::findOrFail($book_id);
        
        // Check if the current user has bookmarked this book
        $isBookmarked = false;
        
        if (Auth::check()) {
            $isBookmarked = $book->isBookmarkedBy(Auth::user());
        }

        return view('user.book_details', compact('book', 'isBookmarked'));
    }

    /**
     * Add book to cart
     */
    public function addToCart($book_id)
    {
        $book = Book::findOrFail($book_id);

        // Initialize the cart if it doesn't exist
        if (!session()->has('cart')) {
            session()->put('cart', []);
        }

        // Get the current cart session
        $cart = session()->get('cart');

        // Add the book to the cart if it's not already there
        if (!in_array($book_id, $cart)) {
            $cart[] = $book_id;
            session()->put('cart', $cart);
            return redirect()->route('book.details', $book_id)->with('success', 'Book added to cart.');
        }

        return redirect()->route('book.details', $book_id)->with('info', 'Book is already in your cart.');
    }

    /**
     * Display all bookmarked books
     */
    public function showBookmarks()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your bookmarks.');
        }

        $user = Auth::user();
        $bookmarked_books = $user->bookmarkedBooks()->get();

        return view('user.bookmarks', compact('bookmarked_books'));
    }

    /**
     * Remove a book from the bookmarks
     */
    public function removeBookmark($book_id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to manage your bookmarks.');
        }

        $book = Book::findOrFail($book_id);
        Auth::user()->removeBookmark($book);

        return redirect()->route('book.bookmarks')->with('success', 'Book removed from bookmarks.');
    }

    /**
     * Add/remove book from bookmarks (toggle behavior)
     */
    public function toggleBookmark($book_id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to bookmark books.');
        }

        $book = Book::findOrFail($book_id);
        $user = Auth::user();

        if ($user->hasBookmarked($book)) {
            $user->removeBookmark($book);
            $message = 'Book removed from bookmarks.';
        } else {
            $user->bookmarkBook($book);
            $message = 'Book added to bookmarks.';
        }

        return redirect()->route('book.details', $book_id)->with('success', $message);
    }
}
