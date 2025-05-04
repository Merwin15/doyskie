<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function showTotalBooks()
    {
        $books = include(base_path('app/Data/books.php'));
        $totalBooks = count($books);

    
        return view('admin.total-books', compact('books', 'totalBooks'));
    }
    
        
    public function editBook($book_id)
    {
        $books = include(base_path('app/Data/books.php')); 
    
        $book = $books[$book_id] ?? null;
    
        if (!$book) {
            return redirect()->route('admin.books.index')->with('error', 'Book not found');
        }
    
        return view('admin.edit-book', compact('book'));
    }
    
    // Update book details
    public function updateBook(Request $request, $book_id)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);

        // Get books from the PHP file
        $books = include(base_path('app/Data/books.php'));
        

        // Update the book
        if (isset($books[$book_id])) {
            $books[$book_id]['title'] = $validated['title'];
            $books[$book_id]['author'] = $validated['author'];
            $books[$book_id]['genre'] = $validated['genre'];
        }

        // Saves the updated books back to the file
        file_put_contents(base_path('app/Data/books.php'), '<?php return ' . var_export($books, true) . ';');

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully');
    }

    // Delete book
    public function deleteBook($book_id)
    {
    // Get books from the PHP file
    $books = include(base_path('app/Data/books.php'));

    // Removes the book
    if (isset($books[$book_id])) {
        unset($books[$book_id]);
    }

    // Saves the updated books back to the file
    file_put_contents(base_path('app/Data/books.php'), '<?php return ' . var_export($books, true) . ';');

    return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully');
    }

    public function index()
{
    // TO read the books from books.php
    $books = include(base_path('app/Data/books.php'));
    
    return view('admin.total-books', compact('books'));
}
    public function createBook()
    {
        return view('admin.create-book');
}

public function storeBook(Request $request)
{
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'genre' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validates image
    ]);

    $books = include(base_path('app/Data/books.php'));

    // Handles image upload
    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    }

    // Adds new book
    $books[] = [
        'book_id' => count($books) + 1,
        'title' => $request->input('title'),
        'author' => $request->input('author'),
        'genre' => $request->input('genre'),
        'description' => $request->input('description'),
        'image' => $imageName,
    ];

    // Save back to PHP file
    file_put_contents(base_path('app/Data/books.php'), '<?php return ' . var_export($books, true) . ';');

    return redirect()->route('admin.books.index')->with('success', 'Book added successfully!');
}

// Shows the user management page
public function manageUsers()
{
    // Get all users from the database
    $users = User::all();
    $totalUsers = $users->count();
    
    return view('admin.manage-users', compact('users', 'totalUsers'));
}

// Shows the form for creating a new user
public function createUser()
{
    return view('admin.create-user');
}

// Stores a new user in the database
public function storeUser(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('admin.manage-users')->with('success', 'User added successfully!');
}

    // Shows the form for editing an existing user
    public function editUser($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('admin.edit-user', compact('user'));
    }

    // Updates user information
    public function updateUser(Request $request, $user_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user_id,
        ]);

        $user = User::findOrFail($user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.manage-users')->with('success', 'User updated successfully!');
    }

    // Delete a user
    public function deleteUser($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();

        return redirect()->route('admin.manage-users')->with('success', 'User deleted successfully!');
}
}
